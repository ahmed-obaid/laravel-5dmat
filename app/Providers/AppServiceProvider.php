<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use App\models\category;
use App\models\skill;
use App\models\page;
use App;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories',category::get());
        view()->share('skills',skill::get());
        view()->share('pages',page::get());
     
        //dd(session()->get('locale'));
  
   
   }

 }

   