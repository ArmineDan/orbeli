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
use App\NotFound;

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
                "text"=> trans('text.auth'),
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
            ->where ('id','=', $id )
            ->where ('lang_id','=', $lng)
            ->get();

            if(count($about_authors) < 1) {
                // dd('nu-nu');
                $popular_tags = Tags::load_all_popular_tags();
                $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();
                $all_data=array(
                    "lang"=> $lang,
                    "event"=> $calendar,
                    "menu"=>$menu, 
                    "mostViewed"=> $mostViewed,  
                    "popular_tags"=> $popular_tags,
                    "not_found" => true,
                    "not_found_text" => $notFound[0]->error_text,
                );
                return view('errors.pageNotFound1')-> with('all_last_posts',$all_data); 
            }

            $a_last_posts = Author::authors_posts($id);
            //return $a_last_posts[0]->posts;
            $all_last_posts = array(
                'authors' => $about_authors,
                'menu'=>$menu,
                "event"=> $calendar,
                "lang"=> $lang,
                "a_posts" =>  $a_last_posts[0]->posts
            );

            //return  $all_last_posts['a_posts'];
            return  view('about_me',compact('all_last_posts'));
    
        }else{
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
		//$all_posts =  Author::with('posts')->where('id','=',$auth_id)->orderByRaw('id DESC')->paginate(3);  
	//return $all_posts->posts;
       $all_posts = Author::all_authors_posts($auth_id,'posts');
        $all_videos = Author::all_authors_posts($auth_id,'videos');
        $all_announs = Author::all_authors_posts($auth_id,'announcements');
        $all_news = Author::all_authors_posts($auth_id,'news');
        $all_opinions = Author::all_authors_posts($auth_id,'opinions'); 
        $popular_tags=Tags::load_all_popular_tags();
        $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
              
        //return $all_posts;
       
        $all_data = array(       
        'menu'=>$menu, 
        "event"=> $calendar,
        "lang"=> $lang,
        "post" => $all_posts[0]->posts,
        "videos"=>$all_videos,
        "announcements"=>$all_announs,
        "news"=> $all_news,
        "mostViewed"=> $mostViewed,
        "popular_tags" => $popular_tags,
        "opinions"=>$all_opinions,
        "categories"=>$categories,
         );

          
       
     //  return $all_data;
           return view('author_all_posts')-> with('all_last_posts',$all_data);

     
        // return $all_last_posts;    
       //return  view('current_posts',compact('all_last_posts'));
    
        }
        else{              
            return  redirect('/en');
            } 
        }


}
