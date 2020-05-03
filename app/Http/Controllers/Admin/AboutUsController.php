<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AboutUsService;
use Illuminate\Http\Response;

class AboutUsController extends Controller {

    public $aboutUsService;
    public function __construct(AboutUsService $aboutUsService)
    {
        $this->middleware('auth');
        $this->aboutUsService = $aboutUsService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $about  = $this->aboutUsService->listAboutUs();
        $tableData = $this->aboutUsService->datatables($about);

        if($request->ajax())
            return $tableData;

        return view('about_us.index')
              ->with('modal', 'about_us')
              ->with('modal_', 'من نحن')
              ->with('edit_modal', 'adminpanel/about_us')
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
        return $this->aboutUsService->getAboutUs($id);
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
        return $this->aboutUsService->updateAboutUs($data, $id);
    }
}
