<?php

namespace App\Services;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\ServiceType;

class ServiceTypeService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listServicesTypes()
    {
        return ServiceType::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($servicesTypes)
    {
        $tableData = Datatables::of($servicesTypes)
            ->editColumn('image', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$image }}" class="image" width="50px" height="50px"></a>')
            ->addColumn('service', function (ServiceType $serviceType)
            {
                return $serviceType->getService->name_ar;
            })
            ->setRowId('id')
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/services_types')
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
    public function storeServiceType($parameters)
    {
        if(isset($parameters['image']) && $parameters['image'] != ""){
            $data = $this->utilityService->uploadImage($parameters['image']);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);
            $parameters['image'] = $data['image'];
        }else{
            return new Response(['message' => 'image required', 401]);
        }
        $serviceType = new ServiceType();
        $max = $serviceType->max('sort');
        $parameters['sort'] = $max + 1;
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $serviceType->create($parameters);
        return new Response(['status' => true, 'message'=>'تم التسجيل بنجاح']);
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getServiceType(int $serviceTypeId): Response
    {
        $serviceType = ServiceType::findOrFail($serviceTypeId);
        if(!$serviceType instanceof ServiceType)
            return new Response(['message'=>'Service type not found'], 403);

        session(['image'  => $serviceType->image]);
        session(['service_type_id'     => $serviceType->id]);
        return new Response(['status' => true, 'message'=>'Success','data'=> $serviceType->toJson()]);
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
    public function updateServiceType($parameters, $image): Response
    {
        $oldImage = session('image');
        $serviceId = session('service_type_id');
        $serviceType = ServiceType::findOrFail($serviceId);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);

            $parameters['image'] = $data['image'];
            }else{
                $parameters['image']  = $oldImage;
            }
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $serviceType->update($parameters);
        return new Response(['status' => true, 'message' => 'تم التحديث بنجاح']);
    }

    /**
     * Delete Slider.
     * @param $sliderId
     * @return Slider
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteServiceType(int $serviceId)
    {
        return ServiceType::find($serviceId)->delete();
    }

    public function sortServicesTypes($ids)
    {
        for($i = 0; $i < count($ids); $i++){
            $serviceType = ServiceType::findOrFail($ids[$i]);
            $serviceType->sort = $i+1;
            $serviceType->save();
        }
    }
}
