<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Image;
use App\productImage;



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
    //Add New Product
    public function product_store(Request $request){
   

        $request->validate([
            'title'             =>  'required|max:255',
            'description'       =>  'required|max:1200',
            'quantaty'          =>  'required|max:100',
            'price'             =>  'required',
            'product_image'     =>  'required',
        ]);


        //Create the product data model
    	$products= new product;

        //create the product input data 
    	$products->category_id         =1;
    	$products->brand_id            =1;
        $products->title               =$request->title;
        $products->description         =$request->description;
    	$products->slug                =str_slug($products->title);
    	$products->quantaty            =$request->quantaty;
    	$products->price               =$request->price;
    	$products->status              =1;
    	$products->offer_price         =$request->offerprice;
    	$products->admin_id            =1;
        //save all the product data into the product table
        $products->save();

            //check if the product has any product thumbnail image 
           if ($request->hasFile('product_image')){

            //Images are placed at the level of the trampory file
            $image=$request->file('product_image');

            //Rename the image
            $img=time().'.'.$image->getClientOriginalExtension();

            //The picture shows the location of where it will be saved in the project file
            $location=public_path('Forntend/image/'.$img);

             //Image Resize Function 
            $image = Image::make($image)->resize(300, 200);

            //Images from the trampory file bring our project's image file to be saved
            Image::make($image)->save($location);

           //Create the product image model
            $product_images=new productImage;

            //Inser the data inside the product_image Table [product id. image name]
            $product_images->product_id=$products->id;

            $product_images->image=$img;
            $product_images->save();


        }


    
      

        return redirect()->route('createproduct');
    
}
}
