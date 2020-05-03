<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdService;
use Illuminate\Http\Response;

class AdController extends Controller {

    public $adService;
    public function __construct(AdService $adService)
    {
        $this->middleware('auth');
        $this->adService = $adService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $ads  = $this->adService->listAds();
        $tableData = $this->adService->datatables($ads);

        if($request->ajax())
            return $tableData;

        return view('ads.index')
              ->with('modal', 'ads')
              ->with('modal_', 'الأعلانات')
              ->with('edit_modal', 'adminpanel/ads')
              ->with('tableData', $tableData);
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
        return $this->adService->getAd($id);
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
        return $this->adService->updateAd($data, $id);
    }
}
