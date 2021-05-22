<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Alert;
use Response;

class WishlistController extends Controller
{
   public function addWishlist ($id){

    $userid = Auth::id();
    $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    $data = array(
    'user_id' => $userid,
    'product_id' => $id,

    );

			   if (Auth::Check()) {
             
             if ($check) {
              return \Response::json(['error' => 'Product Already Has on your wishlist']);
                //<a href="{{URL:: to('add/wishlist/'.$row->id) }}"  >
            /* $notification=array(
                        'messege'=>'Already has in your wishlist',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);	*/
             }else{

             	DB::table('wishlists')->insert($data);
               return \Response::json(['success' => 'Product Added on wishlist']);

       /*  $notification=array(
                        'messege'=>'product add to wishlist with  success ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); */  
          
             }
			  	 
			  }else{
         return \Response::json(['error' => 'At first loging your account']);   

          /* $notification=array(
                        'messege'=>' you must login first  ',
                        'alert-type'=>'warning'
                         );
                       return Redirect()->back()->with($notification);  */
			  } 

   }

}
