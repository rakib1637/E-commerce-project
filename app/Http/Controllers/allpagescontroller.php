<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Product Model er sathe ai page ta connect kore product.blade.php page a show korar jnno link kora hoyeche
use App\product;

class allpagescontroller extends Controller
{
    public function index(){
    	return view ('pages.homepage');
    }
    public function login(){
    	return view ('pages.login');
    }
    public function register(){
    	return view ('pages.register');
    }
    //prdocut k model er maddhome order kore ene products page a show kora 
    public function products(){
        $products=product::orderby('id','desc')->get();
    return view ('pages.products')->with('products',$products);  

      }
}
