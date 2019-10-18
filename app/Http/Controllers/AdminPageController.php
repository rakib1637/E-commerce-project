<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class AdminPageController extends Controller
{
	//Admin Home page
    public function index(){
    	return view('admin.pages.index');
    }
    //Admin Create Product Page
    public function createproduct(){
    	return view ('admin.pages.product.createproduct');
    }
    public function product_store(Request $request){
    	$products= new product;

    	$products->category_id         =1;
    	$products->brand_id            =1;
        $products->title               =$request->title;
        $products->description         =$request->description;
    	$products->slug                =str_slug($products->title);
    	$products->quantaty            =$request->quantaty;
    	$products->price               =$request->price;
    	$products->status              =1;
    	$products->offer_price         =$request->offerprice;
    	$products->admin_id            =111;

        $products->save();
        return redirect()->route('createproduct');
    }
}
