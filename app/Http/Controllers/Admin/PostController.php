<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;


class PostController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function blogcatlist (){
    	$blogcat= DB::table('post_category')->get();
    	return view('admin.blog.category.index',compact('blogcat'));


    }
    public function storeblogcat (Request $request){

    	$validateData= $request->validate([

         'category_name_en'=> 'required|max:255',
         'category_name_fr'=> 'required|max:255',
    	]);

     $data=array();
     $data['category_name_en']=$request->category_name_en;
     $data['category_name_fr']=$request->category_name_fr;
     DB::table('post_category')->insert ($data);
     
     

      $notification=array(
                'messege'=>'blogCategory added successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    }
 
 public function  Deleteblogcat ($id){

       	DB::table('post_category')->where('id' ,$id)->delete();

       	$notification=array(
                'messege'=>'Category Deleted successfelly ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

       }
public function  Editblogcat($id){

       	$blogcat = DB::table('post_category')->where('id' ,$id)->first();
       	return view('admin.blog.category.edit',compact('blogcat'));
}
   
   public function  Updateblogcat( Request $request ,$id){

     $validateData = $request->validate([
     	'category_name_en' => 'required|max:255', 
        'category_name_fr' => 'required|max:255',]);

     $data=array();
     $data['category_name_en']=$request->category_name_en;
     $data['category_name_fr']=$request->category_name_fr;
     $update=DB::table('post_category')->where('id', $id)->update($data);

     if($update){ 

     	$notification=array(
                'messege'=>'blog Category updated successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('add.bolg.categorylist')->with($notification);

     }else{
     	$notification=array(
                'messege'=>'nothing to update !',
                'alert-type'=>'error'
                 );
               return Redirect()->route('add.bolg.categorylist')->with($notification);
     }
 }
 public function create(){

 	$blogcategory=DB::table('post_category')->get();

return view('admin.blog.create',compact('blogcategory'));

 }

 public function store (Request $request){

  $data=array();
 $data['post_title_en'] = $request->post_title_en;
 $data['post_title_fr'] = $request->post_title_fr;
 $data['category_id'] = $request->category_id;
 $data['post_detail_en'] = $request->post_detail_en;
 $data['post_detail_fr']= $request->post_detail_fr;
  
  $post_image=$request->file('post_image');
  
 if ($post_image) {
     $post_image_name=hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
     Image::make($post_image)->resize(400,200)->save('public/media/post/'.$post_image_name);
     $data['post_image']= 'public/media/post/'.$post_image_name;
     DB::table('post')->insert($data);
     $notification=array(
                'messege'=>'post insert successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
         }else{
         
         $data['post_image']='';
          $notification=array(
                'messege'=>'post insert without image !',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

         }



}
public function index(){
 $post=DB::table('post')->
        join('post_category','post.category_id','post_category.id')->
        select('post.*','post_category.category_name_en')->get();
        //return response()->json($post);
        return view('admin.blog.index',compact('post'));


}

 public function  Deletepost ($id){

        $product=DB::table('post')->where('id' ,$id)->first();
        $image=$product->post_image;
        unlink($image);

        DB::table('post')->where('id' ,$id)->delete();


        $notification=array(
                'messege'=>'post Deleted successfelly ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

     
       }

       public function  Editpost ($id){

        $post = DB::table('product')->where('id' ,$id)->first();
        return view('admin.blog.edit', compact('post') );

       }



       public function updatepost(Request $request , $id){
   $oldimage=$request->old_image;
  $data=array();
 $data['post_title_en'] = $request->post_title_en;
 $data['post_title_fr'] = $request->post_title_fr;
 $data['category_id'] = $request->category_id;
 $data['post_detail_en'] = $request->post_detail_en;
 $data['post_detail_fr']= $request->post_detail_fr;
  
  $post_image=$request->file('post_image');
  
 if ($post_image) {
 	unlink('old_image');
     $post_image_name=hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
     Image::make($post_image)->resize(400,200)->save('public/media/post/'.$post_image_name);
     $data['post_image']= 'public/media/post/'.$post_image_name;
     DB::table('post')->where('id',$id)->update($data);
     $notification=array(
                'messege'=>'post updated successfly !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.blogpost')->with($notification);
         }else{
         
         $data['post_image']='';
          $notification=array(
                'messege'=>'post update without image !',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.blogpost')->with($notification);

         }

       }

}
