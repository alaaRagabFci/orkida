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
                return view('pest_libraries.actionBtns')->with('controller','adminpanel/pest_libraries')
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
        $errors =[];
        $data = $this->utilityService->uploadImage($parameters['image'], 'pest_libraries');
        if(!$data['status'])
            $errors = $data['errors'];
        $parameters['image'] = $data['image'];
        $pest = new PestLibrary();
        $max = $pest->max('sort');
        $parameters['sort'] = $max + 1;
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $pest->create($parameters);
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
    public function getPest(int $pestId)
    {
        $pest = PestLibrary::findOrFail($pestId);
        if(!$pest instanceof PestLibrary)
            return new Response(['message'=>'Pest not found'], 403);
        return $pest;
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
    public function updatePest($parameters, $image)
    {
        $errors =[];
        $pest = PestLibrary::findOrFail($parameters['id']);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image, 'pest_libraries');
            if(!$data['status'])
                $errors = $data['errors'];

            $parameters['image'] = $data['image'];
            unlink($pest->image);
        }else{
            $parameters['image']  = $pest->image;
        }
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $pest->update($parameters);

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
    public function deletePest(int $pestId)
    {
        $pest = PestLibrary::findOrFail($pestId);
        unlink($pest->image);
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
