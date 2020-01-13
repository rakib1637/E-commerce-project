<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\brand;

class CategoriesController extends Controller
{
 public function show($id)
  {

  
 
   $category = category::find($id);
   if(!is_null($category)){
  
     return view('Frontend.pages.categories.show', compact('category'));
 
   }
   else{
   	session()->flash('errors','Sorry, No Product Found');
   	return redirect('/');
   }
  }
   }

