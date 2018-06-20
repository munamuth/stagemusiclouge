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


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function(){
        return view('admin');
    });
    Route::get('/admin/logout', function(){
    	Auth::logout();
    	return redirect('/admin');
    });

    Route::get('/admin/slider', 'SliderController@index');
    Route::post('/admin/slider', 'SliderController@store');
    Route::get('/admin/slider/destroy/{id}/{name}', 'SliderController@destroy');

    Route::get('/admin/gallery', 'GaleryController@index');
    Route::post('/admin/gallery', 'GaleryController@store');    
    Route::get('/admin/gallery/destroy/{id}/{name}', 'GaleryController@destroy');

    Route::get('/admin/menu', 'MenuController@index');
    Route::post('/admin/menu', 'MenuController@store');
    Route::post('/admin/menu/change-photo/{id}', 'MenuController@changePhoto');
    Route::get('/admin/menu/destroy/{id}', 'MenuController@destroy');
    Route::get('/admin/menu/edit/{id}', 'MenuController@edit');
    Route::post('/admin/menu/update/{id}', 'MenuController@update');


    Route::get('/admin/menu-category', 'MenuCategoryController@index');
    Route::post('/admin/menu-category', 'MenuCategoryController@store');
    Route::get('/admin/menu-category/destroy/{id}', 'MenuCategoryController@destroy');

    Route::get('/admin/about', 'AboutController@index');
    Route::post('/admin/about/update/{id}', 'AboutController@update');
    Route::post('/admin/about/update/photo/{id}', 'AboutController@changePhoto');

    Route::get('/admin/news-and-events', 'NewsAndEventController@index');
    Route::post('/admin/news-and-events', 'NewsAndEventController@store');
    Route::get('/admin/news-and-events/edit/{id}', 'NewsAndEventController@edit');
    Route::post('/admin/news-and-events/update/{id}', 'NewsAndEventController@update');
    Route::post('/admin/news-and-events/photo/change/{id}', 'NewsAndEventController@changePhoto');
    Route::get('/admin/news-and-events/destroy/{id}', 'NewsAndEventController@destroy');


    Route::get('/admin/account', 'AccountController@index');


});

Route::middleware(['web'])->group(function () {
	Route::get('/', 'PageController@index');
	Route::get('/menu', 'PageController@menu');
	Route::get('/contact', 'PageController@index');
	Route::get('/about', 'PageController@index');
	Route::get('/news-and-event', 'PageController@index');
	Route::get('/gallery', 'PageController@gallery');
	Route::get('/about-us', 'PageController@about');
	Route::get('/news-and-events', 'PageController@news');
	Route::get('/news-and-events/{name}', 'PageController@viewNews');
	Route::get('/contact-us', 'PageController@contact');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
