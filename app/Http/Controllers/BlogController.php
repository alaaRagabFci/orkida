<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Models\ArticleType;
use App\Models\Service;
use App\Services\MetaTagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\BlogService;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BlogController  extends Controller {

    public $blogService;
    public $metaTagService;
    public function __construct(BlogService $blogService, MetaTagService $metaTagService)
    {
        $this->middleware('auth');
        $this->blogService = $blogService;
        $this->metaTagService = $metaTagService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $blogs  = $this->blogService->listBlogs();
        $tableData = $this->blogService->datatables($blogs);
        if($request->ajax())
            return $tableData;

        return view('blogs.index')
            ->with('modal', 'blogs')
            ->with('modal_', 'مدونة جديدة')
            ->with('edit_modal', 'adminpanel/blogs')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function create(): View
    {
        $articleTypes = ArticleType::get();
        return view('blogs.add')
            ->with('edit_modal', '')
            ->with('articleTypes', $articleTypes);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['image'] = $request->hasFile('image') ? $request->file('image') : "";
        $service = $this->blogService->storeBlog($data);
        if($service['status'] == true)
            $msg='تمت الأضافه بنجاح';
        return back()->with('msg',$msg);
    }

    /**
     * Edit setting.
     * requirements={
     *      {"name"="location_ar", "dataType"="string", "requirement"="\d+", "description"="location ar"}
     *  }
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function edit(int $id): View
    {
        $blogTags = [];
        $articleTypes = ArticleType::get();
        $blog = $this->blogService->getBlog($id);
        $tags = $this->metaTagService->getTags($id, 'blogs');
        for ($i = 0; $i < count($tags); $i++){
            $blogTags[$i] = $tags[$i]->tag;
        }
        $displayedTags = implode(",", $blogTags);
        return view('blogs.edit')
            ->with('displayedTags',$displayedTags)
            ->with('blog',$blog)
            ->with('edit_modal', '')
            ->with('articleTypes', $articleTypes);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(StoreBlogRequest $request, $id): RedirectResponse
    {
        $msg = '';
        $data  = $request->all();
        $data['id'] = $id;
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $blog = $this->blogService->updateBlog($data, $image);
        if($blog['status'] == true)
            $msg='تم التخديث بنجاح';
        return back()->with('msg',$msg);
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
        $this->blogService->deleteBlog($id);

        if($request->ajax())
        {
            return new Response(json_encode(['msg'=>'Deleted Successfully', 203]));
        }
        return redirect()->back();
    }

    public function sortBlogs(Request $request)
    {
        $data  = $request->all();
        $this->blogService->sortBlogs($data);
    }
}
