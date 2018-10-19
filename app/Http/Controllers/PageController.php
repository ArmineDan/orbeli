<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tags;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
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
            return  view('index',compact('all_last_posts'));
            }

    public function load_allFromMenu($id) 
            {
                $menu = Post::menu();
                $categories = Post :: categories();
                $post_with_given_id = DB::table('posts')
                ->orderByRaw('date DESC')
                ->select('posts.*')               
                ->join('categories', 'categories.id', '=', 'posts.categories')
                ->where('categories.name', $id)
                ->get();
                $all_data=array("post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id, "categories"=>$categories);              
            return view('current_posts')-> with('all_last_posts',$all_data);
        
            }
    public function openCurrentPost($date,$title) 
            {
                $menu = Post::menu();
                $categories = Post :: categories();
                $post_with_given_dateANDtitle = DB::table('posts')                
                ->select('posts.*')              
                ->where('date', $date)
                ->where('title', $title)
                ->get();
                $all_data=array("post"=>$post_with_given_dateANDtitle,"menu"=>$menu,"categories"=>$categories);              
            return view('openPostWith_dateANDtitle')-> with('all_last_posts',$all_data);
        
            }        
}
 