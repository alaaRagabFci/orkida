<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SitePhoneService;
use Illuminate\Http\Response;

class SitePhoneController extends Controller {

    public $sitePhoneService;
    public function __construct(SitePhoneService $sitePhoneService)
    {
        $this->middleware('auth');
        $this->sitePhoneService = $sitePhoneService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $phones  = $this->sitePhoneService->listSitePhones();
        $tableData = $this->sitePhoneService->datatables($phones);

        if($request->ajax())
            return $tableData;

        return view('site_phones.index')
              ->with('modal', 'site_phones')
              ->with('modal_', 'هواتف الموقع')
              ->with('edit_modal', 'adminpanel/site_phones')
              ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * requirements={
     *      {"name"="phone", "dataType"="String", "requirement"="\d+", "description"="client name ar"},
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(Request $request): Response
    {
        $data  = $request->all();
        $phone = $this->sitePhoneService->createSitePhone($data);
        return $phone;
    }
    /**
     * Edit client.
     * requirements={
     *      {"name"="id", "dataType"="Integer", "requirement"="\d+", "description"="client id"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function edit(int $id): Response
    {
        return $this->sitePhoneService->getSitePhone($id);
    }

    /**
     * Update client.
     * requirements={
     *      {"name"="id", "dataType"="Integer", "requirement"="\d+", "description"="client id"},
     *      {"name"="name_ar", "dataType"="String", "requirement"="\d+", "description"="client name ar"},
     *      {"name"="name_en", "dataType"="String", "requirement"="\d+", "description"="client name en"},
     *      {"name"="type", "dataType"="String", "requirement"="\d+", "description"="client type"},
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request, int $id): Response
    {
        $data  = $request->all();
        return $this->sitePhoneService->updateSitePhone($data, $id);
    }

    /**
     * Delete client.
     * requirements={
     *      {"name"="id", "dataType"="Integer", "requirement"="\d+", "description"="client id"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function destroy(Request $request, int $id)
    {
        $this->sitePhoneService->deleteSitePhone($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}
