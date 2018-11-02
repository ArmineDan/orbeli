<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use App\Opinion;
use App\Post;
use App\Tags;
use Illuminate\Http\Request;
use Calendar;
use App\Event;
use App;
use DB;
use Session;

    


class PageController extends Controller
{ 


    public function index($locale='en') 

            {
                $rules = ['en','ru','hy'];                      
                    if(in_array($locale,$rules))
                    {
                       Session::put('locale',$locale);
                        App::setLocale($locale);
                    $lang= App::getLocale();

                $calendar= Event::event();
                $opinions = Opinion::load_all();
                $last_posts_vertical = Post::verticalPost();        
                $last_posts_horizontal = Post::horintalPost();
                $menu = Post::menu();
                $LeftComments=  Post::LeftComments(); 
                $mostViewed = Post::mostViewed(); 
                $main_post =  Post::main_post();  
                $popular_tags = Tags::load_popular_tags();           
            
                $archievs = Post::archievs();
                $all_last_posts = array(
                    "vert"=>$last_posts_vertical,
                    "horizontal"=>$last_posts_horizontal,
                    "menu"=>$menu,
                    "leftComments" => $LeftComments,
                    "mostViewed"=> $mostViewed,
                    "main_post" => $main_post,
                    "popular_tags" => $popular_tags,
                    "archievs" => $archievs,
                    "opinions" => $opinions,
                    "event"=> $calendar,
                    "lang"=>$lang
                    
                );   
               
            // return   $all_last_posts['menu'];
            

                    
           //return  view('calendartest',compact('all_last_posts'));
           return  view('index',compact('all_last_posts'));
                    }                
                
                   
              
               else{

               
               return  redirect('/en');
               }
                
              
                
            }

    public function load_allFromMenu($locale,$id) 

            { 
                $rules = ['en','ru','hy'];                      
                    if(in_array($locale,$rules))
                    {
                       Session::put('locale',$locale);
                        App::setLocale($locale);
                $lang = App::getLocale();
                
                $land_id =Post::getLangId(); 
                //return  $land_id;
                $calendar= Event::event();
                $menu = Post::menu();
                $categories = Post :: categories();
                $popular_tags=Tags::load_popular_tags();
                $post_with_given_id = DB::table('posts')
                ->select('posts.*','authors.name','authors.lastname')                                
                ->join('categories', 'categories.id', '=', 'posts.post_typ')
                ->join('authors', 'authors.id', '=', 'posts.author_id')                
                ->where('categories.name', $id)                
                ->orderBy('date','DESC')  
                ->paginate(6);                
                $mostViewed = Post::mostViewed();
                
                $all_data=array("lang"=> $lang, "event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
           
                return view('current_posts')-> with('all_last_posts',$all_data);
            }
            else{

               
                return  redirect('/en');
                }
              
            }
            
    public function openCurrentPost( $locale,$date,$title) 
            {  
                $rules = ['en','ru','hy'];                      
                if(in_array($locale,$rules))
                {
                        Session::put('locale',$locale);
                        App::setLocale($locale);
                        $lang = App::getLocale();                
                        $calendar= Event::event();
                        $menu = Post::menu();
                    // $archievs=Post::archievs();
                        $popular_tags=Tags::load_popular_tags();
                        $post_with_given_dateANDtitle = DB::table('posts')                
                        ->select('posts.*')              
                        ->where('date', $date)
                        ->where('title', $title)
                        ->get();
                        $mostViewed = Post::mostViewed();
                        $all_data=array("lang"=> $lang,"event"=> $calendar,"post"=>$post_with_given_dateANDtitle,"menu"=>$menu, "mostViewed"=> $mostViewed,   "popular_tags"=> $popular_tags);              
           
                        return view('openPostWith_dateANDtitle')-> with('all_last_posts',$all_data);
           }
                else{              
                    return  redirect('/en');
                    }                
                
            } 

        public function openArchieve($date) 
            {   $calendar= Event::event();
                $menu = Post::menu();
                $categories = Post :: categories();
                $popular_tags=Tags::load_popular_tags();
                $post_with_given_id = DB::table('posts')
                ->select('posts.*','authors.name','authors.lastname')                        
                ->join('categories', 'categories.id', '=', 'posts.post_typ')
                ->join('authors', 'authors.id', '=', 'posts.authors_id')
                ->where('posts.date', $date)
                ->paginate(6);
                $mostViewed = Post::mostViewed();
                
                $all_data=array("event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$date,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
           
                return view('current_posts')-> with('all_last_posts',$all_data);
        
            }        
}
 