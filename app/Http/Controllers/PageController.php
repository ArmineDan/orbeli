<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    public function index() 
            {
                $last_posts_vertical = Post::horintalPost();        
                $last_posts_horizontal = Post::verticalPost();
                $menu = Post::menu();
                $all_last_posts=array("vert"=>$last_posts_vertical,"horizontal"=>$last_posts_horizontal,"menu"=>$menu);   
            return  view('index',compact('all_last_posts'));
            }
    public function load_allFromMenu($id) 
            {
                $menu = Post::menu();
                $categories = Post :: categories();
                $post_with_given_id = DB::table('posts')
                ->orderByRaw('date DESC')
                ->select('posts.*')               
                ->join('post_type', 'post_type.id', '=', 'posts.post_typ')
                ->where('post_type.name', $id)
                ->get();
                $all_data=array("post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id, "categories"=>$categories);              
            return view('current_posts')-> with('all_last_posts',$all_data);
        
            }
}
 