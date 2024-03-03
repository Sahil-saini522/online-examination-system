<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;

class AdminController extends Controller
{
       public function store(Request $request){
         $sub= new Subject;
         $sub->subject= $request->subject;
         $sub->save();

       }
   public function showdata(){

       $sub= subject::paginate(5);

       return view('admin.dashboard',compact('sub'));

        
   }
   
   public function update(Request $request, $id)
   { $sub= subject::findorfail($id);
        $sub->subject= $request->editsubject;
        $sub->save();
   }

   public function edit($id){
     $user =Subject::find($id);

     return view('admin.dashboard', ['user'=>$user]);

   }


  
}
