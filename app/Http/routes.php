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
    Route::get("/categories", "CategoriesController@index");
    Route::get("/categories/translations/{id}", "CategoriesController@displayTranslations");
    Route::get("/categories/create", "CategoriesController@create");
    Route::get("/categories/create/{id}/lang", "CategoriesController@langcreate");
    Route::post("/categories/store", "CategoriesController@store");
    Route::post("/categories/langstore", "CategoriesController@langstore");
    Route::get("/categories/{id}/edit", "CategoriesController@edit");
    Route::get("/categories/{id}/editlang", "CategoriesController@langedit");
    Route::post("/categories/update", "CategoriesController@update");
    Route::post("/categories/langupdate", "CategoriesController@langupdate");
    Route::get("/categories/{id}/active", "CategoriesController@active");
    Route::get("/categories/{id}/deactive", "CategoriesController@deactive");
    Route::post("/categories/delete", "CategoriesController@destroy");
    Route::post("/categories/langdelete", "CategoriesController@langdestroy");
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
    Route::get("/appbenefits/translations/{id}", "AppbenefitsController@translations");
    Route::get("/appbenefits/create", "AppbenefitsController@create");
    Route::get("/appbenefits/create/{id}/lang", "AppbenefitsController@langcreate");
    Route::post("/appbenefits/store", "AppbenefitsController@store");
    Route::post("/appbenefits/langstore", "AppbenefitsController@langstore");
    Route::get("/appbenefits/{id}/edit", "AppbenefitsController@edit");
    Route::get("/appbenefits/{id}/editlang", "AppbenefitsController@langedit");
    Route::post("/appbenefits/update", "AppbenefitsController@update");
    Route::post("/appbenefits/langupdate", "AppbenefitsController@langupdate");
    Route::get("/appbenefits/{id}/active", "AppbenefitsController@active");
    Route::get("/appbenefits/{id}/deactive", "AppbenefitsController@deactive");
    Route::post("/appbenefits/delete", "AppbenefitsController@destroy");
    Route::post("/appbenefits/langdelete", "AppbenefitsController@langdestroy");
});


Route::group([], function()
{
    Route::get("/appcodes/{id}", "AppcodesController@index");
    Route::get("/appcodes/create/{benefit_id}", "AppcodesController@create");
    Route::post("/appcodes/store", "AppcodesController@store");
    Route::get("/appcodes/{id}/edit", "AppcodesController@edit");
    Route::post("/appcodes/update", "AppcodesController@update");
    Route::get("/appcodes/{id}/active", "AppcodesController@active");
    Route::get("/appcodes/{id}/deactive", "AppcodesController@deactive");
    Route::post("/appcodes/delete", "AppcodesController@destroy");
});

Route::group([], function()
{
    Route::get("/appestablishments", "AppestablishmentsController@index");
    Route::get("/appestablishments/translation/{id}", "AppestablishmentsController@displayTranslations");
    Route::get("/appestablishments/create", "AppestablishmentsController@create");
    Route::get("/appestablishments/create/{id}/lang", "AppestablishmentsController@langcreate");
    Route::post("/appestablishments/store", "AppestablishmentsController@store");
    Route::post("/appestablishments/langstore", "AppestablishmentsController@langstore");
    Route::get("/appestablishments/{id}/edit", "AppestablishmentsController@edit");
    Route::get("/appestablishments/{id}/langedit", "AppestablishmentsController@langedit");
    Route::post("/appestablishments/update", "AppestablishmentsController@update");
    Route::post("/appestablishments/langupdate", "AppestablishmentsController@langupdate");
    Route::get("/appestablishments/{id}/active", "AppestablishmentsController@active");
    Route::get("/appestablishments/{id}/deactive", "AppestablishmentsController@deactive");
    Route::post("/appestablishments/delete", "AppestablishmentsController@destroy");
    Route::post("/appestablishments/langdelete", "AppestablishmentsController@langdestroy");
});