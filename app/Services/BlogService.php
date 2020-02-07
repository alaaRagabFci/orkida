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
            ->editColumn('description', function (Blog $blog)
            {
                return htmlspecialchars_decode($blog->description);
            })
            ->setRowId('id')
            ->addColumn('actions', function ($data)
            {
                return view('blogs.actionBtns')->with('controller','adminpanel/blogs')
                    ->with('id', $data->id)
                    ->render();
            })->rawColumns(['actions', 'image', 'description'])->make(true);

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
        $errors =[];
        $data = $this->utilityService->uploadImage($parameters['image']);
        if(!$data['status'])
            $errors = $data['errors'];
        $parameters['image'] = $data['image'];
        $blog = new Blog();
        $max = $blog->max('sort');
        $parameters['sort'] = $max + 1;
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $parameters['slug'] = str_replace(' ', '-', $parameters['slug']);
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
        if(count($errors) > 0)
            return $errors;
        return ['status' => true, 'message'=>'تم التسجيل بنجاح'];
    }

    /**
     * Get client.
     * @param $settingId
     * @return Setting
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function getBlog(int $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        if(!$blog instanceof Blog)
            return new Response(['message'=>'Blog not found'], 403);
        return $blog;
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
    public function updateBlog($parameters, $image)
    {
        $errors =[];
        $blog = Blog::findOrFail($parameters['id']);
        if(isset($image) && $image != ""){
            $data = $this->utilityService->uploadImage($image);
            if(!$data['status'])
                $errors = $data['errors'];

            $parameters['image'] = $data['image'];
        }else{
            $parameters['image']  = $blog->image;
        }
        $parameters['slug'] = str_replace(' ', '-', $parameters['slug']);
        $parameters['is_active'] = isset($parameters['is_active']) ?  1 : 0;
        $blog->update($parameters);
        if($blog){
            MetaTag::where('blog_id', $parameters['id'])->delete();
            $tags = explode (",", $parameters['tags']);
            foreach ($tags as $tag){
                $metaTag = new MetaTag();
                $metaTag->tag = $tag;
                $metaTag->blog_id = $parameters['id'];
                $metaTag->save();
            }
        }
        if(count($errors) > 0)
            return $errors;
        return ['status' => true, 'message'=>'تم التحديث بنجاح'];
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
