<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    public function index() {

        $last_posts_vertical = Post::horintalPost();        
        $last_posts_horizontal = Post::verticalPost();
       // $menu= Post::menu();
        $all_last_posts=array("vert"=>$last_posts_vertical,"horizontal"=>$last_posts_horizontal);
   
      return  view('welcome',compact('all_last_posts'));
    }
}
 