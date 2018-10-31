<?php

/* Like a PageController */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Tags;
use App\Category;

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
        $last_posts_vertical_1 = Post::with('getCategory')
            ->where('status','<>','main')
            ->orderByRaw('date DESC')
            ->limit(3)
            ->get();
        
        $last_posts_horizontal_1 = Post::with('getCategory')
            ->where('status','<>','main')
            ->orderByRaw('date DESC')
            ->offset(3)
            ->limit(3)
            ->get();

        $last_posts_vertical = Post::horintalPost();
        $last_posts_horizontal = Post::verticalPost();
        $menu = Category::all();
        $LeftComments=  Post::LeftComments(); 
        $mostViewed = Post::mostViewed(); 
        $main_post =  Post::main_post();  
        $popular_tags=Tags::load_popular_tags();
        $archievs=Post::archievs();
        $all_last_posts=array(
            "vert"=>$last_posts_vertical_1,
            "horizontal"=>$last_posts_horizontal_1,
            "menu"=>$menu,
            "leftComments"=>$LeftComments,
            "mostViewed"=> $mostViewed,
            "main_post" =>$main_post,
            "popular_tags"=> $popular_tags,
            "archievs"=>$archievs
        );
        // return $menu;
        return view('home', compact('all_last_posts'));
    }
}
