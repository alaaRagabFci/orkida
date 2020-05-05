<?php

namespace App\Providers;

use App\Models\{AboutUs, PestLibrary, Setting, SitePhone, Service};
use Illuminate\Support\{ServiceProvider, Facades\Schema};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): Void
    {
        Schema::defaultStringLength(191);

        $settings = Setting::first();
        $sitePhones = SitePhone::all();
        $about = AboutUs::first();
        $pestControlObj = Service::where(['category_id'=> 1, 'is_active' => 1, 'sub_service'=> null])->first();
        $pestControls = Service::where(['is_active' => 1, 'sub_service'=> $pestControlObj->id])->latest()->get();
        $otherServices = Service::where(['category_id'=> 2, 'is_active' => 1, 'sub_service'=> null])->orderBy('sort', 'ASC')->get();
        $pestLibrariesMenu = PestLibrary::where(['sub_pest'=> null, 'is_active' => 1])->orderBy('sort', 'ASC')->take(12)->get();

        view()->share(
            [
                'settings' => $settings,
                'sitePhones' => $sitePhones,
                'about' => $about,
                'pestControls' => $pestControls,
                'pestLibrariesMenu' => $pestLibrariesMenu,
                'otherServices' => $otherServices,
                'pestControlObj' => $pestControlObj,
            ]
        );
    }
}
