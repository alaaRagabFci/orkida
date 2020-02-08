<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ArticleTypeService;
use Illuminate\Http\Response;

class ArticleTypeController extends Controller {

    public $articleTypeService;
    public function __construct(ArticleTypeService $articleTypeService)
    {
        $this->middleware('auth');
        $this->articleTypeService = $articleTypeService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $articles  = $this->articleTypeService->listArticleTypes();
        $tableData = $this->articleTypeService->datatables($articles);

        if($request->ajax())
            return $tableData;

        return view('article_types.index')
              ->with('modal', 'article_types')
              ->with('modal_', 'أقسام المقالات')
              ->with('edit_modal', 'adminpanel/article_types')
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
        $articleType = $this->articleTypeService->createArticleType($data);
        return $articleType;
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
        return $this->articleTypeService->getArticleType($id);
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
        return $this->articleTypeService->updateArticleType($data, $id);
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
        $this->articleTypeService->deleteArticleType($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }
}
