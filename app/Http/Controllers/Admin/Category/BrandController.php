<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use DB;

class BrandController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand (){

    	$brand= Brand::all();
    	return view('admin.category.brand', compact('brand')); //compact function to create an arry to existing variable  in this exemple arry for category data 
    	
    }
     public function storebrand (Request $request){
     	$validateData=$request->validate([
     		'brand_name'=>'required|unique:brands|max:255',
     	]);
     	$data=array();
     	$data['brand_name']= $request->brand_name;
     	$image= $request->file('brand_logo');

     	if($image){

     		$image_name= date('dmy_h_s_i');
     		$ext=strtolower($image->getClientOriginalExtension());
     		$image_full_name=$image_name.'.'.$ext;
     		$upload_path='public/media/brand/';
     		$image_url=$upload_path.$image_full_name;
     		$success = $image->move($upload_path,$image_full_name);
     		$data['brand_logo']= $image_url;
     		$brand = DB::table('brands')->insert($data);

     		 $notification=array(
                'messege'=>'Brand insert successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
     	}else{
     		$brand = DB::table('brands')->insert($data);
     		$notification=array(
                'messege'=>'it is done !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
     	}

    	}
    
}
