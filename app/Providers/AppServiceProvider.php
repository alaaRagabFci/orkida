<?php

namespace App\Providers;

use App\Models\{AboutUs, Setting, SitePhone};
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings = Setting::first();
        $sitePhones = SitePhone::all();
        $about = AboutUs::first();

        view()->share(
            [
                'settings' => $settings,
                'sitePhones' => $sitePhones,
                'about' => $about,
            ]
        );
    }
}
