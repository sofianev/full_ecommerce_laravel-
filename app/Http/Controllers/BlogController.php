<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BlogController extends Controller
{
    public function blog(){
    	$post = DB::table('post')
		->join('post_category','post.category_id','post_category.id')
		->select('post.*','post_category.category_name_en','post_category.category_name_fr')
		->get();
		//return response()->json($post);
		return view('pages.blog',compact('post'));
    }

	public function English(){
		Session::get('lang');
		Session()->forget('lang');
		Session::put('lang','english');
		return redirect()->back();
  
	}
  
	public function Français(){
		Session::get('lang');
		Session()->forget('lang');
		Session::put('lang','Français');
		return redirect()->back();
		
	}

	public function BlogSingle($id){
		$posts = DB::table('post')->where('id',$id)->get();
		return view('pages.blog_single',compact('posts'));
  
	}

}
