<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;

class ProductsController extends Controller
{
    //prdocut k model er maddhome order kore ene products page a show kora 
    public function products(){
        $products=product::orderby('id','desc')->paginate(20);
    	return view ('Frontend.pages.products')->with('products',$products);  

      }
    public function show($slug){
    	 $product= product::where('slug', $slug)->first();
    	 if (!is_NULL($product)) {
    	 	return view ('Frontend.pages.show', compact('product'));
    	 }
    	 else{
    	 	session()->flash('Errors','No Product  Found !');
    	 	return redirect()->route('products');
    	 }
     }
}
