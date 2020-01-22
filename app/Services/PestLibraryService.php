<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\PestLibrary;

class PestLibraryService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listPestLibraries()
    {
        return PestLibrary::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($pests)
    {
        $tableData = Datatables::of($pests)
            ->editColumn('image', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$image }}" class="image" width="50px" height="50px"></a>')
            ->setRowId('id')
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/pest_libraries')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'image', 'metaTag'])->make(true);

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
    public function storePest($parameters)
    {
        if(isset($parameters['image']) && $parameters['image'] != ""){
            $data = $this->utilityService->uploadImage($parameters['image']);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);
            $parameters['image'] = $data['image'];
        }else{
            return new Response(['message' => 'image required', 401]);
        }
        $pest = new PestLibrary();
        $max = $pest->max('sort');
        $parameters['sort'] = $max + 1;
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $pest->create($parameters);
        return new Response(['status' => true, 'message'=>'تم التسجيل بنجاح']);
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getPest(int $pestId): Response
    {
        $pest = PestLibrary::findOrFail($pestId);
        if(!$pest instanceof PestLibrary)
            return new Response(['message'=>'Pest not found'], 403);

        session(['image'  => $pest->image]);
        session(['pest_id'     => $pest->id]);
        return new Response(['status' => true, 'message'=>'Success','data'=> $pest->toJson()]);
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
    public function updatePest($parameters, $image): Response
    {
        $oldImage = session('image');
        $pestId = session('pest_id');
        $pest = PestLibrary::findOrFail($pestId);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);

            $parameters['image'] = $data['image'];
            }else{
                $parameters['image']  = $oldImage;
            }
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $pest->update($parameters);
        return new Response(['status' => true, 'message' => 'تم التحديث بنجاح']);
    }

    /**
     * Delete Slider.
     * @param $sliderId
     * @return Slider
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deletePest(int $pestId)
    {
        return PestLibrary::find($pestId)->delete();
    }

    public function sortPests($ids)
    {
        for($i = 0; $i < count($ids); $i++){
            $pest = PestLibrary::findOrFail($ids[$i]);
            $pest->sort = $i+1;
            $pest->save();
        }
    }
}
