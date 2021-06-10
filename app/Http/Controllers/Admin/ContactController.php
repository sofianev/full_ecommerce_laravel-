<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function AllMessage(){
        $message =	DB::table('contat')->get();
        return view('admin.contact.all_message',compact('message'));
        }
       
}
