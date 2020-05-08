<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{ArticleType, Blog, CompanyValuable, Faq, MetaTag, PestLibrary, QuestionCategory, Service, Slider};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $sliders = Slider::all();
        $pestLibraries = PestLibrary::where(['is_active' => 1, 'sub_pest'=> null])->orderBy('sort', 'ASC')->take(8)->get();
        $latestBlog = Blog::where('is_active', 1)->latest()->first();
        $blogs = Blog::where('is_active', 1)->where('id', '!=', $latestBlog->id)->orderBy('id', 'DESC')->latest()->take(5)->get();

        return view('Front.home',[
            'sliders' => $sliders,
            'pestLibraries' => $pestLibraries,
            'blogs' => $blogs,
            'latestBlog' => $latestBlog,
        ]);
    }

    public function sendMessage(): RedirectResponse
    {
        $data = request()->all();
        Mail::send('Front.mail', $data, function($message) use($data) {
            $message
            ->to('alaaragab34@gmail.com', 'Mr.Hesahm')
            ->subject('Service inquiry');
         });

        return redirect()->back()->with('msg', 'تم أرسال الرساله بنجاح');
    }

    public function search(): RedirectResponse
    {
        $serviceSlug = request()->query();
        $slug = app()->getLocale() == 'ar' ? 'slug_ar' : 'slug_en';
        $service = Service::where($slug, $serviceSlug['searchService'])->first();
        return redirect()->to(app()->getLocale()."/services/".$serviceSlug['searchService']);
    }

    public function siteSearch(): View
    {
        $serviceSlug = request()->query();
        $slug = app()->getLocale() == 'ar' ? 'slug_ar' : 'slug_en';
        $name = app()->getLocale() == 'ar' ? 'name_ar' : 'name_en';
        $services = Service::where($slug, 'like', $serviceSlug['searchService'].'%')->orWhere($name, 'like', $serviceSlug['searchService'].'%')->get();
        $pestLibraries = PestLibrary::where($slug, 'like', $serviceSlug['searchService'].'%')->orWhere($name, 'like', $serviceSlug['searchService'].'%')->get();
        return view('Front.search',[
            'services' => $services,
            'pestLibraries' => $pestLibraries
        ]);
    }

    public function aboutUs(): View
    {
        $companyValuables = CompanyValuable::get();
        return view('Front.about', compact('companyValuables'));
    }

    public function contactUs(): View
    {
        return view('Front.contact');
    }

    public function faqs(): View
    {
        $query = request()->query();
        if($query){
            $categoryObj = QuestionCategory::where('category_ar', $query)->orWhere('category_en', $query)->first();
            if($categoryObj)
                $commonQuestions = Faq::where(['question_category_id'=> $categoryObj->id, 'is_active' => 1])->get();
            else
                $commonQuestions =[];
            }else{
            $commonQuestions = Faq::where(['is_common'=> 1, 'is_active' => 1])->take(5)->get();
        }

        $categories = QuestionCategory::get();
        return view('Front.faqs',compact('categories', 'commonQuestions', 'query'));
    }

    public function getQuestion($faqSlug): View
    {
        $question = Faq::where('slug_ar', $faqSlug)->orWhere('slug_en', $faqSlug)->firstOrFail();
        $categories = QuestionCategory::get();
        return view('Front.questionDetails',compact('categories', 'question'));
    }

    public function getService($serviceSlug): View
    {
        $serviceDetails = Service::where('slug_ar', $serviceSlug)->orWhere('slug_en', $serviceSlug)->firstOrFail();
        $lang = app()->getLocale() == 'ar' ? 'AR' : 'EN';
        $tags = MetaTag::where(['service_id' => $serviceDetails->id, 'lang' => $lang])->get(); 
        $relatedArticles = MetaTag::where('service_id', null)->whereIn('tag', $tags->pluck('tag'))->get();
        $subServices = Service::where(['is_active' => 1, 'sub_service' => $serviceDetails->id])->get();
        
        return view('Front.service-details',[
            'serviceDetails' => $serviceDetails,
            'subServices' => $subServices,
            'relatedArticles' => $relatedArticles,
            'tags' => $tags,
        ]);
    }

    public function blogs(): View{
        $articleTypes = ArticleType::where('is_active', 1)->get();
        $text = request()->query();
        if(isset($text['searchText']) && $text['searchText'] != ""){
            $headerBlog = Blog::where('name', 'like',$text['searchText'].'%')->orWhere('slug', 'like', $text['searchText'].'%')->first();
            if($headerBlog)
                $blogs = Blog::where('name', $text['searchText'])->orWhere('slug', $text['searchText'])->where('id', '!=', $headerBlog->id)->latest()->paginate(9);
            else
                $blogs = [];

        }else{
            $headerBlog = Blog::orderBy('sort', 'ASC')->first();
            $blogs = Blog::where('is_active', 1)->where('id', '!=', $headerBlog->id)->latest()->paginate(8);  
        }

        return  view('Front.blogs',[
            'headerBlog' => $headerBlog,
            'blogs' => $blogs,
            'articleTypes' => $articleTypes
        ]);
    }

    public function blogsCategory($slug): View{
        $articleTypes = ArticleType::where('is_active', 1)->get();
        $type = ArticleType::where('slug', $slug)->first();
        $headerBlog = Blog::where('article_id', $type->id)->orderBy('sort', 'ASC')->first();
        $blogs = Blog::where(['is_active' => 1, 'article_id' => $type->id])->where('id', '!=', $headerBlog->id)->latest()->paginate(8);

        return  view('Front.blogs',[
            'headerBlog' => $headerBlog,
            'blogs' => $blogs,
            'articleTypes' => $articleTypes
        ]);
    }
}
