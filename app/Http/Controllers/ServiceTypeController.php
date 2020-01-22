<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\ServiceTypeService;
use Illuminate\Http\Response;

class ServiceTypeController  extends Controller {

    public $serviceTypeService;
    public function __construct(ServiceTypeService $serviceTypeService)
    {
        $this->middleware('auth');
        $this->serviceTypeService = $serviceTypeService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $servicesTypes  = $this->serviceTypeService->listServicesTypes();
        $tableData = $this->serviceTypeService->datatables($servicesTypes);
        $services = Service::get();
        if($request->ajax())
            return $tableData;

        return view('services_types.index')
            ->with('services', $services)
            ->with('modal', 'services_types')
            ->with('modal_', 'نوع خدمه جديده')
            ->with('edit_modal', 'adminpanel/services_types')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(Request $request): Response
    {
        $data  = $request->all();
        $data['image'] = $request->hasFile('image') ? $request->file('image') : "";
        return $this->serviceTypeService->storeServiceType($data);
    }

    /**
     * Edit setting.
     * requirements={
     *      {"name"="location_ar", "dataType"="string", "requirement"="\d+", "description"="location ar"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function edit(int $id): Response
    {
        return $this->serviceTypeService->getServiceType($id);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request): Response
    {
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $data  = $request->all();
        return $this->serviceTypeService->updateServiceType($data, $image);
    }

    /**
     * Delete user.
     * requirements={
     *      {"name"="id", "dataType"="Integer", "requirement"="\d+", "description"="user id"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function destroy(Request $request, $id)
    {
        $this->serviceTypeService->deleteServiceType($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }

    public function sortServicesTypes(Request $request)
    {
        $data  = $request->all();
        return $this->serviceTypeService->sortServicesTypes($data);
    }
}
