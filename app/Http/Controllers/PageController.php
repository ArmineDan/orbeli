<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use App\Opinion;
use App\Post;
use App\Tags;
use Illuminate\Http\Request;
use App\Event;
use App;
use DB;
use Session;

    


class PageController extends Controller
{ 
    static function take_id($arr){
        $for_query='0';
        for($i=0; $i<count($arr); $i++){    
            $for_query.=','.$arr[$i]->id;
                 }
            return $for_query;

    }
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
                       // $last_posts_horizontal = Post::horintalPost();
                        $menu = Post::menu();
                        $LeftComments=  Post::LeftComments(); 
                        $mostViewed = Post::mostViewed(); 
                        $main_post =  Post::main_post();  
                        $main_right =  Post::main_right();  
                        $main_video = Post::main_video();
                        $popular_tags = Tags::load_popular_tags();  
                        $archievs = Post::archievs();
                        $parralax = Post::parralax();
                         // '$get' -ov vercnum enq verevum erevacox posteri id-ry, 
                        // vorpesszi  ayd postery  xoragrer bajnum chkrknven                           
                        $get = PageController::take_id($main_right);
                        $last_posts_xoragrer = Post::xoragreri_poster($get); 

                        $all_last_posts = array(
                            "vert"=>$last_posts_vertical,                            
                            "menu"=>$menu,
                            "leftComments" => $LeftComments,
                            "mostViewed"=> $mostViewed,
                            "main_post" => $main_post,
                            "main_video" => $main_video,                            
                            "main_right" => $main_right,
                            "popular_tags" => $popular_tags,
                            "archievs" => $archievs,
                            "opinions" => $opinions,
                            "event"=> $calendar,
                            "xoragrer"=>$last_posts_xoragrer,
                            "lang"=>$lang,
                            "parralax" => $parralax
                            
                        ); 
           
                        return  view('index',compact('all_last_posts'));
                    }                
                         
               else{               
               return   redirect('/'.App::getLocale());
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
                $post_with_given_id = DB::table('posts as p')                                           
                ->join('categories as c', 'c.id', '=', 'p.post_typ')
                ->join('authors as a', 'a.id', '=', 'p.author_id') 
                ->select('p.*','a.name','a.lastname','a.img as aimg', 'p.img as oimg' )                  
                ->where('c.name', $id)                
                ->orderBy('date','DESC')  
                ->paginate(6);  
                              
                $mostViewed = Post::mostViewed();
                
                $all_data=array("lang"=> $lang, "event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
           
               
                return view('current_posts')-> with('all_last_posts',$all_data);
            }
            else{
                  return  redirect('/'.App::getLocale());
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
                    return  redirect('/'.App::getLocale());
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
 