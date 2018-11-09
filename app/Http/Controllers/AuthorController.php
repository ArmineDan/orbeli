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
        
        $menu = Post::menu();
        $authors =DB::table('authors')
        ->select('*') 
        ->paginate(8);
        $mostViewed = Post::mostViewed();
        $popular_tags = Tags::load_popular_tags(); 
        $calendar= Event::event();
        $all_last_posts = array(
        'authors' => $authors,
        'menu'=>$menu,
        "mostViewed"=> $mostViewed,
        "popular_tags"=> $popular_tags,
        "event"=> $calendar,
        "lang"=> $lang

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
        $calendar= Event::event();
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


       //return $all_last_posts['a_posts'][0];
       return  view('about_me',compact('all_last_posts'));
    
        }
        else{              
            return  redirect('/en');


            } 
        }
     public function author_all_posts($locale,$id)

    { 
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale();
               $lng = Post:: getLangId(); 
        
        $menu = Post::menu();
        $calendar= Event::event();       
        $all_posts = Author::all_posts($id);
        $popular_tags=Tags::load_popular_tags();
        $mostViewed = Post::mostViewed();
        
       
        $all_last_posts = array(       
        'menu'=>$menu, 
        "event"=> $calendar,
        "lang"=> $lang,
        "post" => $all_posts,
        "id"=>trans('text.all_posts'),
        "mostViewed"=> $mostViewed,
        "popular_tags" => $popular_tags,
         );


     //return $all_last_posts;    
       return  view('current_posts',compact('all_last_posts'));
    
        }
        else{              
            return  redirect('/en');
            } 
        }


}
