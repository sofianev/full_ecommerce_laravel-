<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index (){

        $product=DB::table('product')->
                   join('categories','product.category_id','categories.id')->
                   join('brands','product.brand_id','brands.id')->
                   select('product.*','categories.category_name','brands.brand_name')->
                   get();
                  // return response()->json($product);
                   return view('admin.product.index',compact('product'));

    }

    public function create (){
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
                 
    return view('admin.product.create' ,compact('category','brand'));
    	
    }

    public function Getsubcat($category_id){

    $cat=DB::table('subcategories')->where('category_id',$category_id)->get();
      return json_encode($cat);
}

 public function store(Request $request){

 $data=array();
 $data['product_name'] = $request->product_name;
 $data['product_code'] = $request->product_code;
 $data['product_quantity'] = $request->product_quantity;
 $data['category_id'] = $request->category_id;
 $data['subcategory_id']= $request->subcategory_id;
 $data['brand_id']     = $request->brand_id;
 $data['product_size'] = $request->product_size;
 $data['product_color'] = $request->product_color;
 $data['selling_price'] = $request->selling_price;
 $data['product_details'] = $request->product_details;
 $data['video_link'] = $request->video_link;
 $data['main_slider'] = $request->main_slider;
 $data['hot_deal'] = $request->hot_deal;
 $data['best_rated'] = $request->best_rated;
 $data['trend'] = $request->trend;
 $data['mid_slider'] = $request->mid_slider;
 $data['hot_new'] = $request->hot_new;
 $data['status'] = 1;

 $image_one=$request->image_one;
 $image_two=$request->image_two;
 $image_three=$request->image_three;

 //return response()->json($data);

 if ($image_one && $image_two && $image_three) {
     $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
     Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
     $data['image_one']= 'public/media/product/'.$image_one_name;

     $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
     Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
     $data['image_two']= 'public/media/product/'.$image_two_name;

     $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
     Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
     $data['image_three']= 'public/media/product/'.$image_three_name;

     $product=DB::table('product')->insert($data);

     $notification=array(
                'messege'=>'product insert successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);


 }

 }

 public function inactive($id){
    DB::table('product')->where('id',$id)->update(['status'=>0]);
    $notification=array(
                'messege'=>'product successfully inactive !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
 }
 public function active($id){
    DB::table('product')->where('id',$id)->update(['status'=>1]);
    $notification=array(
                'messege'=>'product successfully active !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
 }

 public function  Deleteproduct ($id){

        $product=DB::table('product')->where('id' ,$id)->first();
        $image1=$product->image_one;
        $image2=$product->image_two;
        $image3=$product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);

        DB::table('product')->where('id' ,$id)->delete();


        $notification=array(
                'messege'=>'product Deleted successfelly ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

     
       }
       public function viewproduct($id){

       $product=DB::table('product')->
                   join('categories','product.category_id','categories.id')->
                   join('subcategories','product.subcategory_id','subcategories.id')->
                   join('brands','product.brand_id','brands.id')->
                   select('product.*','categories.category_name','brands.brand_name','subcategories.subcategory_name')->
                   where('product.id',$id)->first();
                   //return response()->json($product);

                   return view('admin.product.show',compact('product'));
                  

       }

       public function  Editproduct($id){

        $product = DB::table('product')->where('id' ,$id)->first();
        return view('admin.product.edit', compact('product') );

}

public function updateproductwithoutphoto ( Request $request , $id){

 $data=array();
 $data['product_name'] = $request->product_name;
 $data['product_code'] = $request->product_code;
 $data['product_quantity'] = $request->product_quantity;
 $data['discount_price'] = $request->discount_price;
 $data['category_id'] = $request->category_id;
 $data['subcategory_id']= $request->subcategory_id;
 $data['brand_id']     = $request->brand_id;
 $data['product_size'] = $request->product_size;
 $data['product_color'] = $request->product_color;
 $data['selling_price'] = $request->selling_price;
 $data['product_details'] = $request->product_details;
 $data['video_link'] = $request->video_link;
 $data['main_slider'] = $request->main_slider;
 $data['hot_deal'] = $request->hot_deal;
 $data['best_rated'] = $request->best_rated;
 $data['trend'] = $request->trend;
 $data['mid_slider'] = $request->mid_slider;
 $data['hot_new'] = $request->hot_new;
 $data['status'] = 1;

  $update=DB::table('product')->where('id', $id)->update($data);

     if($update){ 

        $notification=array(
                'messege'=>'product updated successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.product')->with($notification);

     }else{
        $notification=array(
                'messege'=>'nothing to update !',
                'alert-type'=>'error'
                 );
               return Redirect()->route('all.product')->with($notification);
           }

}
public function updateproductphoto ( Request $request , $id){



 $old_one=$request->image_one;
 $old_two=$request->image_two;
 $old_three=$request->image_three;

     $data=array();
     $image1= $request->file('image_one');
     $image2= $request->file('image_two');
     $image3= $request->file('image_three');

        if($image1){
            unlink($old_one);
            
            $image_name= date('dmy_h_s_i');
            $ext=strtolower($image1->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success = $image1->move($upload_path,$image_full_name);
            $data['image_one']= $image_url;
            
            $productimg = DB::table('product')->where('id',$id)->update($data);

        $notification=array(
                'messege'=>'image updated successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('add.product')->with($notification);

     }
      if($image2){
            unlink($old_two);
            
            $image_name= date('dmy_h_s_i');
            $ext=strtolower($image2->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success = $image2->move($upload_path,$image_full_name);
            $data['image_two']= $image_url;
            
            $productimg = DB::table('product')->where('id',$id)->update($data);

        $notification=array(
                'messege'=>'image updated successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('add.product')->with($notification);

     }
      if($image3){
            unlink($old_three);
            
            $image_name= date('dmy_h_s_i');
            $ext=strtolower($image3->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/product/';
            $image_url=$upload_path.$image_full_name;
            $success = $image3->move($upload_path,$image_full_name);
            $data['image_three']= $image_url;
            
            $productimg = DB::table('product')->where('id',$id)->update($data);

        $notification=array(
                'messege'=>'image updated successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('add.product')->with($notification);

     }
     }
}
