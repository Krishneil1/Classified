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

Route::get('/', 'HomeController@index' );

Auth::routes();

Route::get('user/area/{area}','User\AreaController@store')->name('user.area.store');

Route::group(['prefix' => '/{area}'], function (){
    /**
    *Category
    */
    Route::group(['prefix' =>'/categories'],function(){
        Route::get('/','Category\CategoryController@index')->name('category.index');

    });
});
/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
*/