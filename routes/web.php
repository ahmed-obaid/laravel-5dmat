<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('lang/{locale}',function($locale){
 session()->put('locale',$locale);
   //dd(App::getLocale());
   return redirect()->back();
});
 
 
Route::namespace('backend')->prefix('admin')->middleware('admin')->group(function(){

    Route::get('/','home@index')->name('admin.home');

  //  Route::get('users/create','users@create');
  //  Route::get('users','users@index');
  //  Route::post('users','users@store');   
  //Route::get('users/{id}','users@edit');
   // Route::post('users/{id}','users@update');
   Route::get('users/delete/{id}','users@delete');

    Route::resource('users','users')->except(['show','delete']);
    Route::resource('categories','categories')->except(['show','delete']);
    Route::resource('skills','skills')->except(['show','delete']);
    Route::resource('tags','tags')->except(['show','delete']);
    Route::resource('pages','pages')->except(['show','delete']);
    Route::resource('videos','videos')->except(['show','delete']);
   
    Route::post('comments','videos@commentstore')->name('comment.store');
    Route::get('comments/{id}','videos@commentdelete')->name('comment.delete');
    Route::post('comments/{id}','videos@commentupdate')->name('comment.update');
   
   Route::resource('messages','messages')->only(['index','destroy','edit']);
   Route::post('messages/{id}/replay','messages@replay')->name('message.replay');
   
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('categories/{id}', 'HomeController@categories')->name('front.category');
Route::get('skills/{id}', 'HomeController@skills')->name('front.skill');
Route::get('video/{id}', 'HomeController@videoshow')->name('frontend.videoshow');
Route::get('tag/{id}', 'HomeController@videotag')->name('front.tag');
Route::post('contact-us', 'HomeController@messagestore')->name('contact.store');
Route::get('/', 'HomeController@welcome')->name('contact.store')->name('frontend.landing');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');
Route::get('lang/{lang}', function($lang){
   if(in_array($lang,['en','ar'])){
      if(session()->has('lang')){

        session()->forget('lang');     
      }
        session()->put('lang',$lang); 
        
   }else{
      if(session()->has('lang')){

          session()->forget('lang');     
       }
        session()->put('lang','en'); 
        
   }

// dd(session()->get('lang'));
   return redirect()->back();
})->name('lang');




Route::middleware('auth')->group(function(){
   // dd(auth()->user());
Route::post('comments/{id}','HomeController@commentupdate')->name('front.commentupdate');
Route::post('comments/{id}/create','HomeController@commentadd')->name('front.commentadd');
Route::post('profile/{id}/update','HomeController@profileupdate')->name('profile.update');
});