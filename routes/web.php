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


Route::middleware(['web'])->group(function () {
    Route::get('/', function(){
        return view('admin');
    });

    Route::get('/admin/slider', 'SliderController@index');
    Route::post('/admin/slider', 'SliderController@store');
    Route::get('/admin/slider/destroy/{id}/{name}', 'SliderController@destroy');

    Route::get('/admin/gallery', 'GaleryController@index');
    Route::post('/admin/gallery', 'GaleryController@store');    
    Route::get('/admin/gallery/destroy/{id}/{name}', 'GaleryController@destroy');

    Route::get('/admin/menu', 'MenuController@index');


    Route::get('/admin/menu-category', 'MenuCategoryController@index');
    Route::post('/admin/menu-category', 'MenuCategoryController@store');
    Route::get('/admin/menu-category/destroy/{id}', 'MenuCategoryController@destroy');


});

Route::middleware(['web'])->group(function () {
	Route::get('/', 'PageController@index');
	Route::get('/menu', 'PageController@index');
	Route::get('/contact', 'PageController@index');
	Route::get('/about', 'PageController@index');
	Route::get('/news-and-event', 'PageController@index');
	Route::get('/galery', 'PageController@index');
});


