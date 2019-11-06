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


//Homepage 
Route::get('/','allpagescontroller@index')->name('index');
//Login page
Route::get('/login','allpagescontroller@login')->name('login');
//Register page
Route::get('/register','allpagescontroller@register')->name('register');
//products page
Route::get('/products','allpagescontroller@products')->name('products');
//admin page route group
Route::group(['prefix'=>'admin'], function(){
	Route::get('/','AdminPageController@index')->name('index');
	Route::get('/product/createproduct','AdminPageController@createproduct')->name('createproduct');
	Route::get('/product/manage', 'AdminPageController@manageproduct')->name('manageproduct');
	Route::get('/product/manage/edit/{id}','AdminPageController@edit_product')->name('editproduct');
	Route::post('/prodcut/createproduct','AdminPageController@product_store')->name('admin.product.createproduct');
	Route::post('/prodcut/edit/{id}','AdminPageController@product_update')->name('admin.product.update');
	Route::post('/product/delete/{id}','AdminPageController@product_delete')->name('admin.product.delete');


});



// Default Route
// Route::get('/', function () {
//     return view('welcome');
// });
