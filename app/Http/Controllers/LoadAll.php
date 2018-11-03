<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use App\Event;
use Session;
use App\Post;
use App\Tags;

class LoadAll extends Controller
{
    public function opinions($locale='en') 
    {
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
            Session::put('locale',$locale);
            App::setLocale($locale);
            $lang = App::getLocale();

                 $id=trans('text.opinion');
                 $land_id =Post::getLangId(); 
                 $calendar= Event::event();
                 $menu = Post::menu();
                 $categories = Post :: categories();
                 $popular_tags=Tags::load_popular_tags();
                 $post_with_given_id = DB::table('opinions as o')                
                 ->join('authors as a', 'a.id', '=', 'o.author_id') 
                 ->select('o.*','a.name','a.lastname','a.img as aimg', 'o.img as oimg' )
                 ->where('o.lang_id','=', $land_id )
                 ->orderBy('date','DESC')  
                 ->paginate(6);                
                 $mostViewed = Post::mostViewed();                
                 $all_data=array("lang"=> $lang, "event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
                   return view('all_opinions')-> with('all_last_posts',$all_data);
        }
        else{               
            return  redirect('/'.App::getLocale());
            }

         }

         public function videos($locale='en') 
         {
             $rules = ['en','ru','hy'];                      
             if(in_array($locale,$rules))
             {
                 Session::put('locale',$locale);
                 App::setLocale($locale);
                 $lang = App::getLocale();     
                    
                      $id=trans('text.videos');
                      $land_id =Post::getLangId(); 
                      $calendar= Event::event();
                      $menu = Post::menu();
                      $categories = Post :: categories();
                      $popular_tags=Tags::load_popular_tags();
                      $post_with_given_id = DB::table('videos as o')                
                      ->join('authors as a', 'a.id', '=', 'o.author_id') 
                      ->select('o.*','a.name','a.lastname','a.img as aimg', 'o.img as oimg' )
                      ->where('o.lang_id','=', $land_id )
                      ->orderBy('date','DESC')  
                      ->paginate(6);                
                      $mostViewed = Post::mostViewed();                
                      $all_data=array("lang"=> $lang, "event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
                        return view('all_videos')-> with('all_last_posts',$all_data);
             }
             else{               
                 return  redirect('/'.App::getLocale());
                 }
     
              }



}