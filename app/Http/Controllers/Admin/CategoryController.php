<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use Illuminate\Http\Response;

class CategoryController extends Controller {

    public $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }

    /**
     * List all clients.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $categories  = $this->categoryService->listCategories();
        $tableData = $this->categoryService->datatables($categories);

        if($request->ajax())
            return $tableData;

        return view('categories.index')
              ->with('modal', 'categories')
              ->with('modal_', 'الأقسام الرئيسيه')
              ->with('edit_modal', 'adminpanel/categories')
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
        return $this->categoryService->getCategory($id);
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
        return $this->categoryService->updateCategory($data, $id);
    }
}
