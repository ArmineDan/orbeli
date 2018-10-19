<?php

/* Like a PageController */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_posts_vertical = Post::horintalPost();        
        $last_posts_horizontal = Post::verticalPost();
        $menu = Post::menu();
        $all_last_posts=array("vert"=>$last_posts_vertical,"horizontal"=>$last_posts_horizontal,"menu"=>$menu);   
        // return  view('index',compact('all_last_posts'));
        return view('home', compact('all_last_posts'));
    }
}
