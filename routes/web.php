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
	//Product group
	Route::group(['prefix'=>'product'], function (){
		Route::get('/createproduct','AdminPageController@createproduct')->name('createproduct');
		Route::post('/createproduct','AdminPageController@product_store')->name('admin.product.createproduct');
		Route::get('/manage', 'AdminPageController@manageproduct')->name('manageproduct');
		Route::get('/manage/edit/{id}','AdminPageController@edit_product')->name('editproduct');
		Route::post('/edit/{id}','AdminPageController@product_update')->name('admin.product.update');
		Route::post('/delete/{id}','AdminPageController@product_delete')->name('admin.product.delete');

	});

//Category Route Group
	Route::group(['prefix'=>'Categories'], function (){
		Route::get('/createcategory','AdminPageController@createcategory')->name('createcategory');
		
		Route::post('/createcategory','AdminPageController@category_store')->name('admin.category.createcategory');

		Route::get('/manage', 'AdminPageController@managecategory')->name('managecategory');
		Route::get('/manage/edit/{id}','AdminPageController@edit_category')->name('editcategory');
		Route::post('/edit/{id}','AdminPageController@category_update')->name('admin.category.update');
		Route::post('/delete/{id}','AdminPageController@category_delete')->name('admin.category.delete');

	});
});



// Default Route
// Route::get('/', function () {
//     return view('welcome');
// });
