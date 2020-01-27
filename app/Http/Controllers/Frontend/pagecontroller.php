<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Product Model er sathe ai page ta connect kore product.blade.php page a show korar jnno link kora hoyeche
use App\Models\product;

class pagecontroller extends Controller
{
    public function indexpages(){
    	$products=product::orderby('id','desc')->get();
    	return view ('Frontend.pages.index',compact('products'));
    }
    // public function login(){
    // 	return view ('Frontend.pages.login');
    // }
    // public function register(){
    // 	return view ('Frontend.pages.register');
    // }
    
}
