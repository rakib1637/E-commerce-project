<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Image;
use File;
use App\productImage;
use App\category;


class AdminPageController extends Controller
{
	//Admin Home page
    public function index(){
    	return view('admin.pages.index');
    }

    //Add  New Category and parent category

    public function createcategory(){
       $primary_categories=category::orderby('name','asc')->get();
       return view ('admin.pages.categories.createcategories',compact('primary_categories'));
    }
    //Manage Category
    public function managecategory(){
        $categories=category::orderby('id','desc')->get();
        return view('admin.pages.categories.manage',compact('categories'));
    }


//Category store Database
    public function category_store(Request $request){
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required|max:1200',
            'image'=> 'nullable|image',

        ],
        [
            'name.required' => 'Please Provide Category Name',
            'description.required' => 'Please Provide Category Of the Description',
            'image.image'   =>  'Please Provide a Valid Image with .jpg, .jpeg, .png Extension.... ',
        ]
    );
       $category=new category();
       $category->name =$request->name;
       $category->desc=$request->description;
       $category->parent_id =$request->parent_id;
       if ($request->image) {
           $image=$request->file('image');
           $img=time().'.'.$image->getClientOriginalExtension();
           $location=public_path('vendor-admin/img/'.$img);
           Image::make($image)->save($location);
           $category->image=$img;

            }
       $category->save();

       return redirect()->route('managecategory');
    }
    //Edit Category
    public function edit_category($id){
        $primary_categories=category::orderby('name','asc')->get();
        $category=category::find($id);
        if (!is_null($category)) {
            return view ('admin.pages.categories.editcategories',compact('category','primary_categories'));
        }

    }
    //Category store Database
    public function category_update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required|max:1200',
            'image'=> 'nullable|image',

        ],
        [
            'name.required' => 'Please Provide Category Name',
            'description.required' => 'Please Provide Category Of the Description',
            'image.image'   =>  'Please Provide a Valid Image with .jpg, .jpeg, .png Extension.... ',
        ]
    );
       $category=category::find($id);
       $category->name =$request->name;
       $category->desc=$request->description;
       $category->parent_id =$request->parent_id;
       if ($request->image) {
           $image=$request->file('image');
           $img=time().'.'.$image->getClientOriginalExtension();
           $location=public_path('vendor-admin/img/'.$img);
           Image::make($image)->save($location);
           $category->image=$img;

            }
       $category->save();

       return redirect()->route('managecategory');
    }


    //Category Delete 
    public function category_delete($id){
        $category=category::find($id);
        if(!is_null($category)){
            //If the parent category is null then it will go down and the subcategory will be deleted
            if ($category->parent_id==NULL) {
                
               $sub_categories=category::orderby('name', 'asc')->where('parent_id',$category->id)->get(); 
               foreach ($sub_categories as $sub) {
                   if (File::exists('vendor-admin/img/' .$sub->image)) {
                       File::delete('vendor-admin/img/' .$sub->image);
                   }
                   $sub->delete();
               }
               if (File::exists('vendor-admin/img/'.$category->image)) {
                   File::delete('vendor-admin/img/'.$category->image);
               }
               $category->delete();
            }
        }
        return back();
    }







    //Admin Create Product Page
    public function createproduct(){
    	return view ('admin.pages.product.createproduct');
    }
    //Manage Product
    public function manageproduct(){
        $products=product::orderby('id','desc')->get();
        return view ('admin.pages.product.manage')->with('products', $products);
    }
    //Edit product 
    public function edit_product($id){
       $product = product::find ($id); 
        return view ('admin.pages.product.editproduct')->with('product',$product);
    }
    // Update Product
    public function product_update(Request $request, $id){
        $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required|max:255',
            'quantaty'      => 'required|max:255',
            'price'         => 'required|max:255',
        ]);

        $products = product::find($id);
        $products->title        = $request->title;
        $products->description  = $request->description;
        $products->slug         =str_slug($request->title);
        $products->quantaty     = $request->quantaty;
        $products->price        = $request->price;
        $products->offer_price  = $request->offerprice;
        $products->save();
        return redirect()->route('manageproduct');
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
    	$products->admin_id  
                  =1;
        //save all the product data into the product table
        $products->save();

         if(count($request->product_image)>0){
            foreach ($request->product_image as $image) {
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
         }  








        //single image upload
        /*
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
        }*/
        //succes notification
        session()->flash('notif','Successfully Save Your Product');
        return redirect()->route('manageproduct');
    
    }



    //Delete Product

    public function product_delete ($id){
        $product = product::find ($id);

        $product->delete();
        session()->flash('notif','Successfully Delete Your Prodect');
        return back();
    }


}
