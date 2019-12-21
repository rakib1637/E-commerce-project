<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use Image;
use File;
use App\Models\productImage;
use App\Models\category;



class CategoriesController extends Controller
{
     //Add  New Category and parent category

    public function createcategory(){
       $primary_categories=category::orderby('name','asc')->get();
       return view ('Backend.pages.categories.createcategories',compact('primary_categories'));
    }
    //Manage Category
    public function managecategory(){
        $categories=category::orderby('id','desc')->get();
        return view('Backend.pages.categories.manage',compact('categories'));
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
            return view ('Backend.pages.categories.editcategories',compact('category','primary_categories'));
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
             }
               if (File::exists('vendor-admin/img/'.$category->image)) {
                   File::delete('vendor-admin/img/'.$category->image);
               }
               $category->delete();
            }

        return back();
    }


}
