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
        
        $menu = Post::menu();
        $calendar= Event::event();
        $about_authors =DB::table('authors')
        ->select('*')
        ->where ('id', $id)
        ->get();
        $all_last_posts = array(
        'authors' => $about_authors,
        'menu'=>$menu, 
        "event"=> $calendar,
        "lang"=> $lang,

        );
       return  view('about_me',compact('all_last_posts'));
    
        }
        else{              
            return  redirect('/en');
        }      
        
    }   

    public function get_email($id){
        $msg = "This is a simple message";
        return response()->json(array('msg' => $msg), 200);
    }

}
