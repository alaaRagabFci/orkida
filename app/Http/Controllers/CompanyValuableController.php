<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CompanyValuableService;
use Illuminate\Http\Response;

class CompanyValuableController  extends Controller {

    public $companyValuableService;
    public function __construct(CompanyValuableService $companyValuableService)
    {
        $this->middleware('auth');
        $this->companyValuableService = $companyValuableService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $companyValuables  = $this->companyValuableService->listCompanyValuables();
        $tableData = $this->companyValuableService->datatables($companyValuables);

        if($request->ajax())
            return $tableData;

        return view('company_valuables.index')
            ->with('modal', 'company_valuables')
            ->with('modal_', 'قيمة جديدة')
            ->with('edit_modal', 'adminpanel/company_valuables')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(Request $request): Response
    {
        $data  = $request->all();
        $data['icon'] = $request->hasFile('icon') ? $request->file('icon') : "";
        return $this->companyValuableService->storeCompanyValuable($data);
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
        return $this->companyValuableService->getCompanyValuable($id);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request): Response
    {
        $icon = $request->hasFile('icon') ? $request->file('icon') : "";
        $data  = $request->all();
        return $this->companyValuableService->updateCompanyValuable($data, $icon);
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
        $this->companyValuableService->deleteCompanyValuable($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}
