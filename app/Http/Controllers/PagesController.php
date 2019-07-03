<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class PagesController extends Controller
{
    public function index(){
        $title='Welcome to Printin';
        //return view('pages.index',compact('title')) ;
        $posts= post::orderBy('name','desc')->paginate(6);
        return view('pages.index')->with('posts',$posts);
    }
   

    // public function services(){
    //     $data=array(
    //         'title'=>'Services',
    //         'services'=>['Print A4','print A3','Cetak']
    //     );

    //     return view('pages.services')->with($data);
    // }

}
