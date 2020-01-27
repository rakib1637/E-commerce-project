<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
     //Distirict manage

       public function index(){
        $districts=District::orderby('priority','asc')->get();
        return view('Backend.pages.districts.manage')->with('districts',$districts);
    }
    //Add a new brands
    public function create(){
      
       return view ('Backend.pages.districts.create');
    }
    
 

//brands store Database
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:200',
            'priority' => 'required|max:1200',
            

        ],
        [
            'name.required' => 'Please Provide District Name',
            'priority.required' => 'Priority number for the display list',
            
        ]
    );
       $districts=new District();
       $districts->name =$request->name;
       $districts->priority=$request->priority;
       $districts->save();

       return redirect()->route('admin.districts');
    }
   // Edit Brand
    public function edit($id){
        $districts=District::orderby('name','asc')->get();
        $districts=District::find($id);
        if (!is_null($districts)) {
            return view ('Backend.pages.districts.edit',compact('districts','districts'));
        }

    }








    //Brands store Database
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:200',
            'priority' => 'required|max:1200',
           

        ],
        [
            'name.required' => 'Please Provide District Name',
            'priority.required' => 'Priority number for the display list',
           
        ]
    );
       $districts=District::find($id);
       $districts->name =$request->name;
       $districts->priority=$request->priority;
          
       $districts->save();

       return redirect()->route('admin.districts');
    }


    //Brands Delete 
    public function delete($id){
        $divisions=Division::find($id);
        if (!is_null($divisions)) {
          $districts=District::where('division_id',$division_id)->get();
          foreach ($districts as $district) {
            $district->delete();
          }
          $divisions->delete();
        }

        return back();
    }
}
