<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([], function()
{
    Route::get("/tb_app_categories", "Tb_App_CategoriesController@index");
    Route::get("/tb_app_categories/create", "Tb_App_CategoriesController@create");
    Route::post("/tb_app_categories/store", "Tb_App_CategoriesController@store");
    Route::get("/tb_app_categories/{id}/edit", "Tb_App_CategoriesController@edit");
    Route::post("/tb_app_categories/update", "Tb_App_CategoriesController@update");
    Route::get("/tb_app_categories/{id}/active", "Tb_App_CategoriesController@active");
    Route::get("/tb_app_categories/{id}/deactive", "Tb_App_CategoriesController@deactive");
    Route::post("/tb_app_categories/delete", "Tb_App_CategoriesController@destroy");
});

Route::group([], function()
{
    Route::get("/categories", "CategoriesController@index");
    Route::get("/categories/create", "CategoriesController@create");
    Route::post("/categories/store", "CategoriesController@store");
    Route::get("/categories/{id}/edit", "CategoriesController@edit");
    Route::post("/categories/update", "CategoriesController@update");
    Route::get("/categories/{id}/active", "CategoriesController@active");
    Route::get("/categories/{id}/deactive", "CategoriesController@deactive");
    Route::post("/categories/delete", "CategoriesController@destroy");
});
Route::get('admin', function() {
  return View::make('auth.login');
});
Route::get('admin/login', function() {
  return View::make('auth.login');
});
//POST route
Route::post('admin/login', 'Auth\AuthController@login');

Route::get('logout', array('uses' => 'Auth\AuthController@logout'));
Route::controllers([
    'admin' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group([], function()
{
    Route::get("/appbenefits", "AppbenefitsController@index");
    Route::get("/appbenefits/create", "AppbenefitsController@create");
    Route::post("/appbenefits/store", "AppbenefitsController@store");
    Route::get("/appbenefits/{id}/edit", "AppbenefitsController@edit");
    Route::post("/appbenefits/update", "AppbenefitsController@update");
    Route::get("/appbenefits/{id}/active", "AppbenefitsController@active");
    Route::get("/appbenefits/{id}/deactive", "AppbenefitsController@deactive");
    Route::post("/appbenefits/delete", "AppbenefitsController@destroy");
});

Route::group([], function()
{
    Route::get("/appbenefits", "AppbenefitsController@index");
    Route::get("/appbenefits/create", "AppbenefitsController@create");
    Route::post("/appbenefits/store", "AppbenefitsController@store");
    Route::get("/appbenefits/{id}/edit", "AppbenefitsController@edit");
    Route::post("/appbenefits/update", "AppbenefitsController@update");
    Route::get("/appbenefits/{id}/active", "AppbenefitsController@active");
    Route::get("/appbenefits/{id}/deactive", "AppbenefitsController@deactive");
    Route::post("/appbenefits/delete", "AppbenefitsController@destroy");
});