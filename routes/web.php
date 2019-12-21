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



/*
|--------------------------------------------------------------------------
| All Front End Page Roting Done Here in here list
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Homepage 
Route::get('/', 'Frontend\pagecontroller@index')->name('homepage');
//Login page
Route::get('/login','Frontend\pagecontroller@login')->name('login');
//Register page
Route::get('/register','Frontend\pagecontroller@register')->name('register');
//products page
Route::get('/products','Frontend\ProductsController@products')->name('products');
Route::get('/products/{slug}','Frontend\ProductsController@show')->name('products.show');





/*
|--------------------------------------------------------------------------
| All Back End Page Roting Done Here in here list
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








//admin page route group
Route::group(['prefix'=>'admin'], function(){
	Route::get('/','Backend\PagesController@index')->name('index');
	//Product group
	Route::group(['prefix'=>'product'], function (){
		Route::get('/createproduct','Backend\ProductsController@createproduct')->name('createproduct');
		Route::post('/createproduct','Backend\ProductsController@product_store')->name('admin.product.createproduct');
		Route::get('/manage', 'Backend\ProductsController@manageproduct')->name('manageproduct');
		Route::get('/manage/edit/{id}','Backend\ProductsController@edit_product')->name('editproduct');
		Route::post('/edit/{id}','Backend\ProductsController@product_update')->name('admin.product.update');
		Route::post('/delete/{id}','Backend\ProductsController@product_delete')->name('admin.product.delete');

	});

//Category Route Group
	Route::group(['prefix'=>'Categories'], function (){
		Route::get('/createcategory','Backend\CategoriesController@createcategory')->name('createcategory');
		
		Route::post('/createcategory','Backend\CategoriesController@category_store')->name('admin.category.createcategory');

		Route::get('/manage', 'Backend\CategoriesController@managecategory')->name('managecategory');
		Route::get('/manage/edit/{id}','Backend\CategoriesController@edit_category')->name('editcategory');
		Route::post('/edit/{id}','Backend\CategoriesController@category_update')->name('admin.category.update');
		Route::post('/delete/{id}','Backend\CategoriesController@category_delete')->name('admin.category.delete');

	});


//Brands Route Group
	Route::group(['prefix'=>'Brands'], function (){
		
		Route::get('/create','Backend\BrandController@create')->name('createbrand');
		
		Route::post('/create','Backend\BrandController@store')->name('admin.brands.createbrands');
		Route::get('/', 'Backend\BrandController@index')->name('admin.brands');

		
		Route::get('/manage/edit/{id}','Backend\BrandController@edit')->name('editbrands');
		Route::post('manage/update/{id}','Backend\BrandController@update')->name('admin.brand.update');
		Route::post('manage/delete/{id}','Backend\BrandController@delete')->name('admin.brands.delete');

	});
});



// Default Route
// Route::get('/', function () {
//     return view('welcome');
// });
