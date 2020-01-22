<?php

namespace App\Services;
use App\Models\Blog;
use App\Models\MetaTag;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables as Datatables;
use App\Models\Service;

class BlogService
{
    private $utilityService;
    public function __construct(UtilityService $utilityService){
        $this->utilityService = $utilityService;
    }
    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function listBlogs()
    {
        return Blog::get();
    }

    /**
     * Datatebles
     * @param client
     * @return datatable.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function datatables($blogs)
    {
        $tableData = Datatables::of($blogs)
            ->editColumn('image', '<a href="javascript:;"><img src="{{ config("app.baseUrl").$image }}" class="image" width="50px" height="50px"></a>')
            ->addColumn('service', function (Blog $blog)
            {
                return $blog->getService->name_ar;
            })
            ->addColumn('metaTag', function (Blog $blog)
            {
                return '<a href="blogs/metaTags/'.$blog->id.'">Edit Meta Tag</a>';
            })
            ->setRowId('id')
            ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','adminpanel/blogs')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'image', 'metaTag'])->make(true);

        return $tableData ;
    }

    /**
     * Create description.
     * @param $type
     * @param $username
     * @param $display_name
     * @param $phone
     * @param $image
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function storeBlog($parameters)
    {
        if(isset($parameters['image']) && $parameters['image'] != ""){
            $data = $this->utilityService->uploadImage($parameters['image']);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);
            $parameters['image'] = $data['image'];
        }else{
            return new Response(['message' => 'image required', 401]);
        }
        $blog = new Blog();
        $max = $blog->max('sort');
        $parameters['sort'] = $max + 1;
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $blogId = $blog->create($parameters)->id;
        if($blog){
            $tags = explode (",", $parameters['tags']);
            foreach ($tags as $tag){
                $metaTag = new MetaTag();
                $metaTag->tag = $tag;
                $metaTag->blog_id = $blogId;
                $metaTag->save();
            }
        }
        return new Response(['status' => true, 'message'=>'تم التسجيل بنجاح']);
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getBlog(int $blogId): Response
    {
        $blog = Blog::findOrFail($blogId);
        if(!$blog instanceof Blog)
            return new Response(['message'=>'Blog not found'], 403);

        session(['image'  => $blog->image]);
        session(['blog_id'     => $blog->id]);
        return new Response(['status' => true, 'message'=>'Success','data'=> $blog->toJson()]);
    }

    /**
     * Update client.
     * @param $settingId
     * @param $title_ar
     * @param $title_en
     * @param $description_ar
     * @param $description_en
     * @param $image
     * @param $page
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function updateBlog($parameters, $image): Response
    {
        $oldImage = session('image');
        $blogId = session('blog_id');
        $blog = Blog::findOrFail($blogId);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image);
            if(!$data['status'])
                return new Response(['message' => $data['errors'], 401]);

            $parameters['image'] = $data['image'];
            }else{
                $parameters['image']  = $oldImage;
            }
        $parameters['slug_ar'] = str_replace(' ', '-', $parameters['slug_ar']);
        $parameters['slug_en'] = str_replace(' ', '-', $parameters['slug_en']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $blog->update($parameters);
        return new Response(['status' => true, 'message' => 'تم التحديث بنجاح']);
    }

    /**
     * Delete Slider.
     * @param $sliderId
     * @return Slider
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function deleteBlog(int $blogId)
    {
        return Blog::find($blogId)->delete();
    }

    public function sortBlogs($ids)
    {
        for($i = 0; $i < count($ids); $i++){
            $blog = Blog::findOrFail($ids[$i]);
            $blog->sort = $i+1;
            $blog->save();
        }
    }

    /**
     * List all Setting.
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getBlogTags($blogId)
    {
        return Service::where('blog_id', $blogId)->get();
    }
}
