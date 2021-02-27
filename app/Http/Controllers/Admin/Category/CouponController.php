<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

       }
       
        public function coupon (){

    	$coupon= DB::table('coupons')->get();
    	return view('admin.coupon.coupon',compact('coupon')); //compact function to create an arry to existing variable  in this exemple arry for category data 
    	
    } 

    public function storecoupon (Request $request){

     $data=array();
     $data['coupon']=$request->coupon;
     $data['discount']=$request->discount;
     DB::table('coupons')->insert($data);
     
     

      $notification=array(
                'messege'=>'coupon added successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    }
     public function  Deletecoupon ($id){

       	DB::table('coupons')->where('id' ,$id)->delete();

       	$notification=array(
                'messege'=>'coupon Deleted successfelly ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

       }

       public function  Editcoupon($id){

       	$coupon = DB::table('coupons')->where('id',$id)->first();
       	return view('admin.coupon.edit_coupon', compact('coupon') );
}

public function  Updatecoupon( Request $request ,$id){

     $validateData = $request->validate([
     	'coupon' => 'required|max:255', 
        'discount' => 'required|max:255',]);

     $data=array();
     $data['coupon']=$request->coupon;
     $data['discount']=$request->discount;
     $update=DB::table('coupons')->where('id', $id)->update($data);

     if($update){ 

     	$notification=array(
                'messege'=>'coupon  updated successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admin.coupon')->with($notification);

     }else{
     	$notification=array(
                'messege'=>'nothing to update !',
                'alert-type'=>'error'
                 );
               return Redirect()->route('admin.coupon')->with($notification);
     }

}
   public function newslater(){
    
     $sub=DB::table('newslaters')->get();
     return view('admin.coupon.newslaters', compact('sub'));

}

public function  Deletesub ($id){

       	DB::table('newslaters')->where('id' ,$id)->delete();

       	$notification=array(
                'messege'=>'newslaters Deleted successfelly ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

       }

}
