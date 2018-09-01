<?php

namespace App\Providers;

use Auth;
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
        
        view()->composer('*', function ($view) 
        {
            //The callback will be executed only when the view is actually being composed, so middlewares will be already executed and session will be available
            if(Auth::user()){
                $nbNewInquiries = Inquiry::where('status', 'new')->count();
                $view->with('nbNewInquiries', $nbNewInquiries);
            }    
        });
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
