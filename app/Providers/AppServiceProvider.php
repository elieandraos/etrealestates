<?php

namespace App\Providers;

use App\Models\Inquiry;
use App\Models\Property;
use App\Observers\PropertyObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // property observer to add reference upon creation
        Property::observe(PropertyObserver::class);
        // view share count of new inquiries
        $nbNewInquiries = Inquiry::where('status', 'new')->count();
        View::share('nbNewInquiries', $nbNewInquiries);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
