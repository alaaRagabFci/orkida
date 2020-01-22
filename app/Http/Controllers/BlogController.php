<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\BlogService;
use Illuminate\Http\Response;

class BlogController  extends Controller {

    public $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->middleware('auth');
        $this->blogService = $blogService;
    }

    /**
     * List all settings.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function index(Request $request)
    {
        $blogs  = $this->blogService->listBlogs();
        $tableData = $this->blogService->datatables($blogs);
        $services = Service::get();
        if($request->ajax())
            return $tableData;

        return view('blogs.index')
            ->with('services', $services)
            ->with('modal', 'blogs')
            ->with('modal_', 'مدونة جديدة')
            ->with('edit_modal', 'adminpanel/blogs')
            ->with('tableData', $tableData);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function store(Request $request): Response
    {
        $data  = $request->all();
        $data['image'] = $request->hasFile('image') ? $request->file('image') : "";
        return $this->blogService->storeBlog($data);
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
        return $this->blogService->getBlog($id);
    }

    /**
     * Update client.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function update(Request $request): Response
    {
        $image = $request->hasFile('image') ? $request->file('image') : "";
        $data  = $request->all();
        return $this->blogService->updateBlog($data, $image);
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
        return $this->blogService->sortBlogs($data);
    }
}
