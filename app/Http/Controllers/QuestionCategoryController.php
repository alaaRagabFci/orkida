<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\QuestionCategoryService;
use Illuminate\Http\Response;

class QuestionCategoryController extends Controller {

    public $questionCategoryService;
    public function __construct(QuestionCategoryService $questionCategoryService)
    {
        $this->middleware('auth');
        $this->questionCategoryService = $questionCategoryService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $categories  = $this->questionCategoryService->listQuestionCategories();
        $tableData = $this->questionCategoryService->datatables($categories);

        if($request->ajax())
            return $tableData;

        return view('question_categories.index')
              ->with('modal', 'question_categories')
              ->with('modal_', 'أقسام الأسئله')
              ->with('edit_modal', 'adminpanel/question_categories')
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
        $questionCategory = $this->questionCategoryService->createQuestionCategory($data);
        return $questionCategory;
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
        return $this->questionCategoryService->getQuestionCategory($id);
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
        return $this->questionCategoryService->updateQuestionCategory($data, $id);
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
        $this->questionCategoryService->deleteQuestionCategory($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}
