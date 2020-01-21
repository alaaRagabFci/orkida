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
            ->addColumn('category', function (Service $service)
            {
                return $service->getcategory->name_ar;
            })
            ->setRowId('id')
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/services')
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
    public function storeService($parameters)
    {
        if(isset($parameters['image']) && $parameters['image'] != ""){
            $data = $this->utilityService->uploadImage($parameters['image']);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);
            $parameters['image'] = $data['image'];
        }else{
            return new Response(['message' => 'image required', 401]);
        }
        $service = new Service();
        $max = $service->max('sort');
        $parameters['sort'] = $max + 1;
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
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
        return new Response(['status' => true, 'message'=>'تم التسجيل بنجاح']);
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getService(int $serviceId): Response
    {
        $service = Service::findOrFail($serviceId);
        if(!$service instanceof Service)
            return new Response(['message'=>'Service not found'], 403);

        session(['image'  => $service->image]);
        session(['service_id'     => $service->id]);
        return new Response(['status' => true, 'message'=>'Success','data'=> $service->toJson()]);
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
    public function updateService($parameters, $image): Response
    {
        $oldImage = session('image');
        $serviceId = session('service_id');
        $service = Service::findOrFail($serviceId);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);

            $parameters['image'] = $data['image'];
            }else{
                $parameters['image']  = $oldImage;
            }
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $service->update($parameters);
        return new Response(['status' => true, 'message' => 'تم التحديث بنجاح']);
    }

    /**
     * Delete Slider.
     * @param $sliderId
     * @return Slider
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteService(int $serviceId)
    {
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
}
