<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Blog, PestLibrary, Service, Slider};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $sliders = Slider::all();
        $services = Service::orderBy('sort', 'ASC')->take(6)->get();
        $pestLibraries = PestLibrary::where(['is_active' => 1, 'sub_pest'=> null])->orderBy('sort', 'ASC')->take(8)->get();
        $latestBlog = Blog::where('is_active', 1)->latest()->first();
        $blogs = Blog::where('is_active', 1)->where('id', '!=', $latestBlog->id)->orderBy('id', 'DESC')->latest()->take(5)->get();

        return view('Front.home',[
            'sliders' => $sliders,
            'services' => $services,
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
}
