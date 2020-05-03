<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Models\QuestionCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\FaqqService;
use Illuminate\Http\Response;
use Illuminate\View\View;

class FaqqController extends Controller {

    public $faqService;
    public function __construct(FaqqService $faqService)
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
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function create(): View
    {
        $categories = QuestionCategory::get();
        return view('faqs.add')
            ->with('categories', $categories)
            ->with('edit_modal', '');
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(StoreFaqRequest $request): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $faq = $this->faqService->createFaq($data);
        if($faq['status'] == true)
            $msg='تمت الأضافه بنجاح';
        return back()->with('msg',$msg);
    }

    /**
     * Edit client.
     * requirements={
     *      {"name"="id", "dataType"="Integer", "requirement"="\d+", "description"="client id"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function edit(int $id): View
    {
        $categories = QuestionCategory::get();
        $faq = $this->faqService->getfaq($id);
        return view('faqs.edit')
            ->with('faq',$faq)
            ->with('categories', $categories)
            ->with('edit_modal', '');
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(StoreFaqRequest $request, $id): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['id'] = $id;
        $faq = $this->faqService->updateFaq($data);
        if($faq['status'] == true)
            $msg='تم التخديث بنجاح';
        return back()->with('msg',$msg);
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
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}
