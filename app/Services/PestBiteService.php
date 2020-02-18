<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\PestBite;

class PestBiteService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listBites()
    {
        return PestBite::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($bites)
    {
        $tableData = Datatables::of($bites)
            ->editColumn('image', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$image }}" class="image" width="50px" height="50px"></a>')
            ->addColumn('actions', function ($data)
            {
                return view('pest_bites.actionBtns')->with('controller','adminpanel/pest_bites')
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
    public function storeBite($parameters)
    {
        $errors =[];
        $data = $this->utilityService->uploadImage($parameters['image'], 'pest_bites');
        if(!$data['status'])
            $errors = $data['errors'];
        $parameters['image'] = $data['image'];
        $bite = new PestBite();
        $bite->create($parameters);
        if(count($errors) > 0)
            return $errors;
        return ['status' => true, 'message'=>'تم التسجيل بنجاح'];
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getBite(int $biteId)
    {
        $bite = PestBite::findOrFail($biteId);
        if(!$bite instanceof PestBite)
            return new Response(['message'=>'Bite not found'], 403);
        return $bite;
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
    public function updateBite($parameters, $image)
    {
        $errors =[];
        $bite = PestBite::findOrFail($parameters['id']);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image, 'pest_bites');
            if(!$data['status'])
                $errors = $data['errors'];

            $parameters['image'] = $data['image'];
            unlink($bite->image);
        }else{
            $parameters['image']  = $bite->image;
        }
        $bite->update($parameters);

        if(count($errors) > 0)
            return $errors;
        return ['status' => true, 'message'=>'تم التحديث بنجاح'];
    }

    /**
     * Delete Slider.
     * @param $sliderId
     * @return Slider
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteBite(int $biteId)
    {
        $bite = PestBite::findOrFail($biteId);
        unlink($bite->image);
        return PestBite::find($biteId)->delete();
    }
}
