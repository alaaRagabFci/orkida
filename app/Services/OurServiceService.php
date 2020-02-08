<?php

namespace App\Services;
use App\Models\MetaTag;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Service;

class OurServiceService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listServices()
    {
        return Service::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($services)
    {
        $tableData = Datatables::of($services)
            ->editColumn('image', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$image }}" class="image" width="50px" height="50px"></a>')
            ->editColumn('description_ar', function (Service $service)
            {
                return htmlspecialchars_decode($service->description_ar);
            })
            ->editColumn('description_en', function (Service $service)
            {
                return htmlspecialchars_decode($service->description_en);
            })
            ->addColumn('category', function (Service $service)
            {
                return $service->getcategory->name_ar;
            })
            ->setRowId('id')
            ->addColumn('actions', function ($data)
            {
                return view('services.actionBtns')->with('controller','adminpanel/services')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'image', 'description_ar', 'description_en'])->make(true);

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
    public function storeService($parameters)
    {
        $errors =[];
        $data = $this->utilityService->uploadImage($parameters['image'], 'services');
        if(!$data['status'])
            $errors = $data['errors'];
        $parameters['image'] = $data['image'];
        $service = new Service();
        $max = $service->max('sort');
        $parameters['sort'] = $max + 1;
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $serviceId = $service->create($parameters)->id;
        if($service){
            $tags = explode (",", $parameters['tags']);
            foreach ($tags as $tag){
                $metaTag = new MetaTag();
                $metaTag->tag = $tag;
                $metaTag->service_id = $serviceId;
                $metaTag->save();
            }
        }
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
    public function getService(int $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        if(!$service instanceof Service)
            return new Response(['message'=>'Service not found'], 403);
        return $service;
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
    public function updateService($parameters, $image)
    {
        $errors =[];
        $service = Service::findOrFail($parameters['id']);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image, 'services');
            if(!$data['status'])
                $errors = $data['errors'];

            $parameters['image'] = $data['image'];
            unlink($service->image);
            }else{
                $parameters['image']  = $service->image;
            }
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $service->update($parameters);
        if($service){
            MetaTag::where('service_id', $parameters['id'])->delete();
            $tags = explode (",", $parameters['tags']);
            foreach ($tags as $tag){
                $metaTag = new MetaTag();
                $metaTag->tag = $tag;
                $metaTag->service_id = $parameters['id'];
                $metaTag->save();
            }
        }
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
    public function deleteService(int $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        unlink($service->image);
        return Service::find($serviceId)->delete();
    }

    public function sortServices($ids)
    {
        for($i = 0; $i < count($ids); $i++){
            $service = Service::findOrFail($ids[$i]);
            $service->sort = $i+1;
            $service->save();
        }
    }

    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getServiceTags($serviceId)
    {
        return Service::where('service_id', $serviceId)->get();
    }
}
