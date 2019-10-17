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



// Default Route
// Route::get('/', function () {
//     return view('welcome');
// });
