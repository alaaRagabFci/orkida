<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Blog, CompanyValuable, Faq, PestLibrary, QuestionCategory, Service, Slider};
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
        $services = Service::where($slug, $serviceSlug['searchService'])->orWhere($name, $serviceSlug['searchService'])->get();
        $pestLibraries = PestLibrary::where($slug, $serviceSlug['searchService'])->orWhere($name, $serviceSlug['searchService'])->get();
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
            $categoryColumn = app()->getLocale() == 'ar' ? 'category_ar' : 'category_en';
            $categoryObj = QuestionCategory::where($categoryColumn, $query)->first();
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
        $slug = app()->getLocale() == 'ar' ? 'slug_ar' : 'slug_en';
        $question = Faq::where($slug, $faqSlug)->firstOrFail();
        $categories = QuestionCategory::get();
        return view('Front.questionDetails',compact('categories', 'question'));
    }
}
