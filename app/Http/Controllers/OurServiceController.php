<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\OurServiceService;
use Illuminate\Http\Response;

class OurServiceController  extends Controller {

    public $ourServiceService;
    public function __construct(OurServiceService $ourServiceService)
    {
        $this->middleware('auth');
        $this->ourServiceService = $ourServiceService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $services  = $this->ourServiceService->listServices();
        $tableData = $this->ourServiceService->datatables($services);
        $categories = Category::get();
        if($request->ajax())
            return $tableData;

        return view('services.index')
            ->with('categories', $categories)
            ->with('modal', 'services')
            ->with('modal_', 'خدمة جديده')
            ->with('edit_modal', 'adminpanel/services')
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
        return $this->ourServiceService->storeService($data);
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
        return $this->ourServiceService->getService($id);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request): Response
    {
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $data  = $request->all();
        return $this->ourServiceService->updateService($data, $image);
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
        return $this->mealService->sortMealImages($data);
    }
}
