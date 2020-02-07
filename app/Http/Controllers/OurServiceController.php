<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Category;
use App\Services\MetaTagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\OurServiceService;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OurServiceController  extends Controller {

    public $ourServiceService;
    public $metaTagService;
    public function __construct(OurServiceService $ourServiceService, MetaTagService $metaTagService)
    {
        $this->middleware('auth');
        $this->ourServiceService = $ourServiceService;
        $this->metaTagService = $metaTagService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $services  = $this->ourServiceService->listServices();
        $tableData = $this->ourServiceService->datatables($services);
        if($request->ajax())
            return $tableData;

        return view('services.index')

            ->with('modal', 'services')
            ->with('modal_', 'خدمة جديده')
            ->with('edit_modal', 'adminpanel/services')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function create(): View
    {
        $categories = Category::get();
        return view('services.add')
            ->with('edit_modal', '')
            ->with('categories', $categories);
    }
    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(StoreServiceRequest $request): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['image'] = $request->hasFile('image') ? $request->file('image') : "";
        $service = $this->ourServiceService->storeService($data);
        if($service['status'] == true)
            $msg='تمت الأضافه بنجاح';
        return back()->with('msg',$msg);
    }

    /**
     * Edit setting.
     * requirements={
     *      {"name"="location_ar", "dataType"="string", "requirement"="\d+", "description"="location ar"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function edit(int $id): View
    {
        $serviceTags = [];
        $categories = Category::get();
        $service = $this->ourServiceService->getService($id);
        $tags = $this->metaTagService->getTags($id, 'services');
        for ($i = 0; $i < count($tags); $i++){
            $serviceTags[$i] = $tags[$i]->tag;
        }
        $displayedTags = implode(",", $serviceTags);
        return view('services.edit')
            ->with('displayedTags',$displayedTags)
            ->with('service',$service)
            ->with('edit_modal', '')
            ->with('categories', $categories);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(StoreServiceRequest $request, $id): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['id'] = $id;
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $service = $this->ourServiceService->updateService($data, $image);
        if($service['status'] == true)
            $msg='تم التخديث بنجاح';
        return back()->with('msg',$msg);
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
        $this->ourServiceService->deleteService($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }

    public function sortServices(Request $request)
    {
        $data  = $request->all();
        return $this->ourServiceService->sortServices($data);
    }
}
