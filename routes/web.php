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

	//Admin home Page
	Route::get('/','AdminPageController@index')->name('index');
	//Admin Create Product Page
	Route::get('/product/createproduct','AdminPageController@createproduct')->name('createproduct');

	Route::post('/prodcut/createproduct','AdminPageController@product_store')->name('admin.product.createproduct');

});



// Default Route
// Route::get('/', function () {
//     return view('welcome');
// });
