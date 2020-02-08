<?php

namespace App\Services;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Slider;

class SliderService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listSliders()
    {
        return Slider::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($slider)
    {
        $tableData = Datatables::of($slider)
            ->editColumn('image', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$image }}" class="image" width="50px" height="50px"></a>')
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/sliders')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'image'])->make(true);

        return $tableData ;
    }

    /**
     * Create description.
     * @param $type
     * @param $username
     * @param $display_name
     * @param $phone
     * @param $image
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function storeSlider($parameters)
    {
        if(isset($parameters['image']) && $parameters['image'] != ""){
            $data = $this->utilityService->uploadImage($parameters['image'], 'sliders');
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);
            $parameters['image'] = $data['image'];
        }else{
            return new Response(['message' => 'image required', 401]);
        }
        $slider = new Slider();
        $slider->create($parameters);
        return new Response(['status' => true, 'message'=>'تم التسجيل بنجاح']);
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getSlider(int $companyId): Response
    {
        $slider = Slider::findOrFail($companyId);
        if(!$slider instanceof Slider)
            return new Response(['message'=>'Slider not found'], 403);

        session(['image'  => $slider->image]);
        session(['slider_id'     => $slider->id]);
        return new Response(['status' => true, 'message'=>'Success','data'=> $slider->toJson()]);
    }

    /**
     * Update client.
     * @param $settingId
     * @param $title_ar
     * @param $title_en
     * @param $description_ar
     * @param $description_en
     * @param $image
     * @param $page
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateSlider($parameters, $image): Response
    {
        $oldImage = session('image');
        $sliderId = session('slider_id');
        $slider = Slider::findOrFail($sliderId);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image, 'sliders');
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);

            $parameters['image'] = $data['image'];
            unlink($slider->image);
            }else{
                $parameters['image']  = $oldImage;
            }

        $slider->update($parameters);
        return new Response(['status' => true, 'message' => 'تم التحديث بنجاح']);
    }

    /**
     * Delete Slider.
     * @param $sliderId
     * @return Slider
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteSlider($sliderId)
    {
        $slider = Slider::findOrFail($sliderId);
        unlink($slider->image);
        return Slider::find($sliderId)->delete();
    }
}
