<?php

/* Like a PageController */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Tags;

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
        $LeftComments=  Post::LeftComments(); 
        $mostViewed = Post::mostViewed(); 
        $main_post =  Post::main_post();  
        $popular_tags=Tags::load_popular_tags();
        $archievs=Post::archievs();
        $all_last_posts=array(
            "vert"=>$last_posts_vertical,
            "horizontal"=>$last_posts_horizontal,
            "menu"=>$menu,
            "leftComments"=>$LeftComments,
            "mostViewed"=> $mostViewed,
            "main_post" =>$main_post,
            "popular_tags"=> $popular_tags,
            "archievs"=>$archievs
        ); 
        return view('home', compact('all_last_posts'));
    }
}
