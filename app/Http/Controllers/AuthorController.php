<?php

namespace App\Http\Controllers;

use App\Post;
use App\Author;
use App\Tags;
use App\Event;
use Illuminate\Http\Request;
use App;
use DB;
use Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {   
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale(); 
                $lng = Post:: getLangId(); 
        $menu = Post::menu();
        $authors =DB::table('authors')
        ->select('*')
        ->where('lang_id','=', $lng) 
        ->paginate(8);
        $mostViewed = Post::mostViewed();
        $popular_tags = Tags::load_all_popular_tags(); 
        $calendar= Event::event($lang);
        $all_last_posts = array(
        'authors' => $authors,
        'menu'=>$menu,
        "mostViewed"=> $mostViewed,
        "popular_tags"=> $popular_tags,
        "event"=> $calendar,
        "lang"=> $lang,
         "text"=> trans('text.auth')

        );
        return  view('authors',compact('all_last_posts'));
    }
    else{              
        return  redirect('/en');
        }      
    }
    
    public function about($locale,$id)

    { 
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale();
               $lng = Post:: getLangId(); 
        
        $menu = Post::menu();
        $calendar= Event::event($lang);
        $about_authors = DB::table('authors')
        ->select('*')
        ->where ('id','=', $id)
        ->where ('lang_id','=', $lng)
        ->get();
        $a_last_posts = Author::authors_posts($id);
       
        $all_last_posts = array(
        'authors' => $about_authors,
        'menu'=>$menu, 
        "event"=> $calendar,
        "lang"=> $lang,
        "a_posts" => $a_last_posts
         );

//return count($a_last_posts);
       return  view('about_me',compact('all_last_posts'));
    
        }
        else{              
            return  redirect('/en');


            } 
        }
        
     public function author_all_posts($locale,$auth_id)

    { 
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale();
               $lng = Post:: getLangId();         
        $menu = Post::menu();
        $calendar= Event::event($lang);     
        $categories = Post :: categories();  
        $all_posts = Author::all_authors_posts($auth_id,'posts');
        $all_videos = Author::all_authors_posts($auth_id,'videos');
        $all_announs = Author::all_authors_posts($auth_id,'announcements');
        $all_news = Author::all_authors_posts($auth_id,'news');
        $all_opinions = Author::all_authors_posts($auth_id,'opinions'); 
        $popular_tags=Tags::load_all_popular_tags();
        $mostViewed = Post::mostViewed();
        
       
        $all_data = array(       
        'menu'=>$menu, 
        "event"=> $calendar,
        "lang"=> $lang,
        "post" => $all_posts,
        "videos"=>$all_videos,
        "announcements"=>$all_announs,
        "news"=> $all_news,
        "mostViewed"=> $mostViewed,
        "popular_tags" => $popular_tags,
        "opinions"=>$all_opinions,
        "categories"=>$categories,
         );

          
       
     //  return $all_data;
           return view('archieves')-> with('all_last_posts',$all_data);

     
        // return $all_last_posts;    
       //return  view('current_posts',compact('all_last_posts'));
    
        }
        else{              
            return  redirect('/en');
            } 
        }


}
