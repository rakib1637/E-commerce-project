<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;

class DivisionController extends Controller
{
    //Division  manage

       public function index(){
        $divisions=Division::orderby('priority','asc')->get();
        return view('Backend.pages.division.manage')->with('divisions',$divisions);
    }
    //Add a new Division
    public function create(){
      
       return view ('Backend.pages.division.create');
    }
    
 

//Division  store Database
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:200',
            'priority' => 'required|max:1200',
            

        ],
        [
            'name.required' => 'Please Provide Division Name',
            'priority.required' => 'Priority number for the display list',
            
        ]
    );
       $divisions=new Division();
       $divisions->name =$request->name;
       $divisions->priority=$request->priority;
       $divisions->save();

       return redirect()->route('admin.divisions');
    }
   // Edit Division
    public function edit($id){
        $divisions=Division::orderby('name','asc')->get();
        $divisions=Division::find($id);
        if (!is_null($divisions)) {
            return view ('Backend.pages.division.edit',compact('divisions','divisions'));
        }

    }








    //Division store Database
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:200',
            'priority' => 'required|max:1200',
           

        ],
        [
            'name.required' => 'Please Provide Category Name',
            'priority.required' => 'Priority number for the display list',
           
        ]
    );
       $divisions=Division::find($id);
       $divisions->name =$request->name;
       $division->priority=$request->priority;
          
       $divisions->save();

       return redirect()->route('admin.divisions');
    }


    //Division Delete 
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
