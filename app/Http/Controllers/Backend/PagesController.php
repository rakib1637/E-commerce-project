<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use Image;
use File;
use App\Models\productImage;
use App\Models\category;


class PagesController extends Controller
{
	//Admin Home page
    public function index(){
    	return view('Backend.pages.index');
    }



}
