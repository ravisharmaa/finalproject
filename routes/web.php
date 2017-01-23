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
Route::get('/redirect',         ['as'=>'cms.redirect',  'uses'=>'SocialAuthController@redirect'   ]);
Route::get('/callback',         ['as'=>'cms.callback',    'uses'=>'SocialAuthController@callback']);

Route::get('cms/logout', function (){
   Auth::logout();
   return redirect()->back();
});

$this->group(['prefix'=>'cms',  'as'=>'cms.', 'namespace'=>'Admin\\'], function (){
    $this->get('dashboard',                             ['as'=> 'dashboard',                                'uses'=>'DashboardController']);
    $this->get('category/index',                        ['as'=> 'category.index',                           'uses'=>'CategoryController@index']);
    $this->get('category/create',                       ['as'=> 'category.create',                          'uses'=>'CategoryController@create']);
    $this->post('category/save',                        ['as'=> 'category.store',                           'uses'=>'CategoryController@store']);
    $this->get('category/edit/{id}',                    ['as'=> 'category.edit',                       'uses'=>'CategoryController@edit']);
    $this->put('category/update/{id}',                  ['as'=> 'category.update',                       'uses'=>'CategoryController@update']);
    $this->get('sub-category/index/{slug}',             ['as'=> 'category.sub-cat.index',                   'uses'=>'CategoryController@subCatIndex']);
    $this->get('category/add-subcat/{cat_name}',        ['as'=> 'category.create.sub-cat',                  'uses'=>'CategoryController@subForm']);
    $this->get('category/add-sub-child/{slug}',         ['as'=> 'category.create.sub-child',                'uses'=>'CategoryController@subChildIndex']);
    $this->get('subcategory/create-child/{id}',          ['as'=>'category.add-child.subcat',                 'uses'=>'CategoryController@subChildCreate']);

    $this->post('product/create',                       ['as'=>'product.store',                                 'uses'=>'ProductController@store']);
    $this->get('product/index',                         ['as'=>'product.index',                                  'uses'=>'ProductController@index']);
    $this->get('product/show/{id}',                     ['as'=>'product.show',                                  'uses'=>'ProductController@show']);
    $this->get('product/edit/{id}',                     ['as'=>'product.edit',                                  'uses'=>'ProductController@edit']);

//    Routes for search
    $this->get('search/products',                       ['as'=>'category.search',                              'uses'=>'DashboardController@search']);
});
