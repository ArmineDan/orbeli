<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{
    public function loadAllQaxaqakanutyun($d) 
   {
     $all_posts = DB::table('posts')->where('post_typ', $d)->get(); 
     return view('current_posts')-> with('all_posts',$all_posts);

   }
   
   
}
