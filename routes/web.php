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

    Route::get('/admin/slider', 'SliderController@index');


});

Route::middleware(['web'])->group(function () {
	//Route::get('/admin', 'TblPostController@index');
});


