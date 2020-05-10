<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{ArticleType, Blog, CompanyValuable, Faq, Message, MetaTag, PestLibrary, QuestionCategory, Service, Slider};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $sliders = Slider::all();
        $pestLibraries = PestLibrary::where(['is_active' => 1, 'sub_pest' => null])->orderBy('sort', 'ASC')->take(8)->get();
        $latestBlog = Blog::where('is_active', 1)->latest()->first();
        $blogs = Blog::where('is_active', 1)->where('id', '!=', $latestBlog->id)->orderBy('id', 'DESC')->latest()->take(5)->get();

        return view('Front.home', [
            'sliders' => $sliders,
            'pestLibraries' => $pestLibraries,
            'blogs' => $blogs,
            'latestBlog' => $latestBlog,
        ]);
    }

    public function sendMessage(): RedirectResponse
    {
        $data = request()->all();
        Mail::send('Front.mail', $data, function ($message) use ($data) {
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
        return redirect()->to(app()->getLocale() . "/services/" . $serviceSlug['searchService']);
    }

    public function siteSearch(): View
    {
        $articleTypes = ArticleType::where('is_active', 1)->get();
        $serviceSlug = request()->query();
        $slug = app()->getLocale() == 'ar' ? 'slug_ar' : 'slug_en';
        $name = app()->getLocale() == 'ar' ? 'name_ar' : 'name_en';
        $servicesResult = Service::where($slug, 'like', '%'.$serviceSlug['txt'] . '%')->orWhere($name, 'like', '%'.$serviceSlug['txt'] . '%')->get();
        $pestLibrariesResult = PestLibrary::where($slug, 'like', '%'.$serviceSlug['txt'] . '%')->orWhere($name, 'like', '%'.$serviceSlug['txt'] . '%')->get();
        return view('Front.search', [
            'servicesResult' => $servicesResult,
            'pestLibrariesResult' => $pestLibrariesResult,
            'articleTypes' => $articleTypes,
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
        if ($query) {
            $categoryObj = QuestionCategory::where('category_ar', $query)->orWhere('category_en', $query)->first();
            if ($categoryObj)
                $commonQuestions = Faq::where(['question_category_id' => $categoryObj->id, 'is_active' => 1])->get();
            else
                $commonQuestions = [];
        } else {
            $commonQuestions = Faq::where(['is_common' => 1, 'is_active' => 1])->take(5)->get();
        }

        $categories = QuestionCategory::get();
        return view('Front.faqs', compact('categories', 'commonQuestions', 'query'));
    }

    public function getQuestion($faqSlug): View
    {
        $question = Faq::where('slug_ar', $faqSlug)->orWhere('slug_en', $faqSlug)->firstOrFail();
        $categories = QuestionCategory::get();
        return view('Front.questionDetails', compact('categories', 'question'));
    }

    public function getService($serviceSlug): View
    {
        $serviceDetails = Service::where('slug_ar', $serviceSlug)->orWhere('slug_en', $serviceSlug)->firstOrFail();
        $tags = MetaTag::where(['service_id' => $serviceDetails->id, 'lang' => 'AR'])->get();
        if (count($tags) > 0) {
            $relatedArticles = MetaTag::where('service_id', null)->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere('tag', 'LIKE', '%' . $tag->tag . '%');
                }
            })->get();
        } else {
            $relatedArticles = [];
        }
        $subServices = Service::where(['is_active' => 1, 'sub_service' => $serviceDetails->id])->get();

        return view('Front.service-details', [
            'serviceDetails' => $serviceDetails,
            'subServices' => $subServices,
            'relatedArticles' => $relatedArticles,
            'tags' => $tags,
        ]);
    }

    public function blogs(): View
    {
        if (app()->getLocale() == 'en')
            abort(404);

        $articleTypes = ArticleType::where('is_active', 1)->get();
        $text = request()->query();
        if (isset($text['searchText']) && $text['searchText'] != "") {
            $headerBlog = Blog::where('name', 'like', '%'.$text['searchText'] . '%')->orWhere('slug', 'like', '%'.$text['searchText'] . '%')->take(2)->get();
            if (count($headerBlog) > 1)
                $blogs = Blog::whereNotIn('id', $headerBlog->pluck('id'))->where('name', 'like', '%'.$text['searchText'] . '%')->orWhere('slug', 'like', '%'.$text['searchText'] . '%')->latest()->paginate(10);
            else
                $blogs = [];
        } else {
            $headerBlog = Blog::orderBy('sort', 'ASC')->take(2)->get();
            $blogs = Blog::where('is_active', 1)->whereNotIn('id', $headerBlog->pluck('id'))->latest()->paginate(10);
        }

        return  view('Front.blogs', [
            'headerBlog' => $headerBlog,
            'blogs' => $blogs,
            'articleTypes' => $articleTypes
        ]);
    }

    public function blogsCategory($slug): View
    {
        if (app()->getLocale() == 'en')
            abort(404);

        $articleTypes = ArticleType::where('is_active', 1)->get();
        $type = ArticleType::where('slug', $slug)->first();
        $headerBlog = Blog::where('article_id', $type->id)->orderBy('sort', 'ASC')->take(2)->get();
        if (count($headerBlog) > 1)
            $blogs = Blog::where(['is_active' => 1, 'article_id' => $type->id])->whereNotIn('id', $headerBlog->pluck('id'))->latest()->paginate(10);
        else
            $blogs = [];

        return  view('Front.blogs', [
            'headerBlog' => $headerBlog,
            'blogs' => $blogs,
            'articleTypes' => $articleTypes
        ]);
    }

    public function blogDetails($slug): View
    {
        if (app()->getLocale() == 'en')
            abort(404);

        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->viewers += 1;
        $blog->save();

        $latestArticles = Blog::where('id', '!=', $blog->id)->latest()->take(4)->get();

        $tags = MetaTag::where('blog_id', $blog->id)->get();
        if (count($tags) > 0) {
            $relatedArticles = MetaTag::where('service_id', null)->where('blog_id', '!=',  $blog->id)->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere('tag', 'LIKE', '%' . $tag->tag . '%');
                }
            })->take(6)->get();
        } else {
            $relatedArticles = [];
        }

        return view('Front.blog-details', [
            'blog' => $blog,
            'tags' => $tags,
            'latestArticles' => $latestArticles,
            'relatedArticles' => $relatedArticles,
        ]);
    }

    public function userOpinion(): RedirectResponse
    {
        $data = request()->all();
        $message = new Message();

        if ($data['is_benefit'] == 1) {
            $body = 'المقترحات :' . $data['content'] . ' - البريد الألكتروني :' . $data['email'] . ' - الأسم :' . $data['name'];
            $message->is_benefit = 1;
            $message->message = $body;
        } else {
            if ($data['topic'] != "")
                $body = 'المقال غير مفيد لأن ' . $data['topic'] . ' - البريد الألكتروني :' . $data['email'] . ' - الأسم :' . $data['name'];
            else
                $body = 'المقال غير مفيد لأن ' . $data['content'] . ' - البريد الألكتروني :' . $data['email'] . ' - الأسم :' . $data['name'];

            $message->is_benefit = 0;
            $message->message = $body;
        }

        $message->save();

        return redirect()->back()->with('msg', 'تم أرسال تعليقك بنجاح.');
    }

    public function services(): View
    {
        $allServices = Service::where(['category_id' => 2, 'is_active' => 1])->orderBy('id', 'ASC')->get();

        return  view('Front.services', [
            'allServices' => $allServices,
        ]);
    }

    public function matchedBlogsTags($tag): View{
        $relatedArticles = MetaTag::where('service_id', null)->where('tag', 'LIKE', '%' . str_replace('-', ' ', trim($tag)) . '%')->latest()->paginate(2);
        return view('Front.tags', compact('relatedArticles', 'tag'));
    }
}
