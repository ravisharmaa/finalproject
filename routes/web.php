<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function(){
   return view('welcome');
});

Route::get('/cms',              ['as'=>'cms.login',     'uses'=>'Auth\\LoginController@showLoginForm']);
Route::post('/cms',             ['as'=>'cms.login',     'uses'=>'Auth\\LoginController@handleLogin']);
Route::get('cms/logout', function (){
   Auth::logout();
   return redirect()->back();
});

$this->group(['prefix'=>'cms',  'as'=>'cms.', 'namespace'=>'Admin\\'], function (){
    $this->get('dashboard',                             ['as'=> 'dashboard',                                'uses'=>'DashboardController']);
    $this->get('category/index',                        ['as'=> 'category.index',                           'uses'=>'CategoryController@index']);
    $this->get('category/create',                       ['as'=> 'category.create',                          'uses'=>'CategoryController@create']);
    $this->post('category/save',                        ['as'=> 'category.store',                           'uses'=>'CategoryController@store']);
    $this->get('category/edit',                         ['as'=> 'category.edit',                            'uses'=>'CategoryController@edit']);
    $this->get('sub-category/index/{slug}',             ['as'=> 'category.sub-cat.index',                            'uses'=>'CategoryController@subCatIndex']);
    $this->get('category/add-subcat/{cat_name}',        ['as'=> 'category.add_subcat',                      'uses'=>'CategoryController@subForm']);

});
