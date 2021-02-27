<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function storeNewslater (Request $request){
   	$validateData=$request->validate([
     'email'=>'required|unique:newslaters|max:255',
     	]);
   	 $data=array();
     $data['email']=$request->email;
     DB::table('newslaters')->insert($data);
     
      $notification=array(
                'messege'=>'newslaters  added successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);


   }
}
