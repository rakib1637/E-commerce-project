<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use Image;
use File;
use App\Models\productImage;
use App\Models\brands;



class BrandController extends Controller
{
     //Brands manage

       public function index(){
        $brand=brands::orderby('id','desc')->get();
        return view('Backend.pages.brands.manage')->with('brand',$brand);
    }
    //Add a new brands
    public function create(){
      
       return view ('Backend.pages.brands.create');
    }
    
 

//brands store Database
    public function store(Request $request){
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
       $brand=new brands();
       $brand->name =$request->name;
       $brand->desc=$request->description;
             if ($request->image) {
           $image=$request->file('image');
           $img=time().'.'.$image->getClientOriginalExtension();
           $location=public_path('vendor-admin/brand-images/'.$img);
           Image::make($image)->save($location);
           $brand->image=$img;

            }
       $brand->save();

       return redirect()->route('admin.brands');
    }
   // Edit Brand
    public function edit($id){
        $brand=brands::orderby('name','asc')->get();
        $brand=brands::find($id);
        if (!is_null($brand)) {
            return view ('Backend.pages.brands.edit',compact('brand','brand'));
        }

    }
    //Brands store Database
    public function update(Request $request,$id){
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
       $brand=brands::find($id);
       $brand->name =$request->name;
       $brand->desc=$request->description;
             if ($request->image) {
           $image=$request->file('image');
           $img=time().'.'.$image->getClientOriginalExtension();
           $location=public_path('vendor-admin/brand-images/'.$img);
           Image::make($image)->save($location);
           $brand->image=$img;

            }
       $brand->save();

       return redirect()->route('admin.brands');
    }


    //Brands Delete 
    public function delete($id){
        $brand=brands::find($id);
        if(!is_null($brand)){
          
               if (File::exists('vendor-admin/brand-images/'.$brand->image)) {
                   File::delete('vendor-admin/brand-images/'.$brand->image);
               }
               $brand->delete();
            }

        return back();
    }


}
