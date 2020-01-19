<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FaqService;
use Illuminate\Http\Response;

class FaqController extends Controller {

    public $faqService;
    public function __construct(FaqService $faqService)
    {
        $this->middleware('auth');
        $this->faqService = $faqService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $faqs  = $this->faqService->listFaqs();
        $tableData = $this->faqService->datatables($faqs);

        if($request->ajax())
            return $tableData;

        return view('faqs.index')
              ->with('modal', 'faqs')
              ->with('modal_', 'الأسئله الشائعه')
              ->with('edit_modal', 'adminpanel/faqs')
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
        return $this->faqService->createFaq($data);
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
        return $this->faqService->getFaq($id);
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
        return $this->faqService->updateFaq($data, $id);
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
        $this->faqService->deleteFaq($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully',200]));
        }
        return redirect()->back();
    }
}
