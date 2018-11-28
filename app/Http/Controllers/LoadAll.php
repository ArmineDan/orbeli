<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use App\Event;
use App\News;
use App\Video;
use Session;
use App\Post;
use App\Tags;
use App\Opinion;
use App\Announcement;



class LoadAll extends Controller
{
    public function opinions($locale) 
    {
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
            Session::put('locale',$locale);
            App::setLocale($locale);
            $lang = App::getLocale();

                 $id=trans('text.opinions');
                 $lng =Post::getLangId();                 
                 $calendar= Event::event($lang);
                 $menu = Post::menu();
                 $categories = Post :: categories();
                 $popular_tags=Tags::load_popular_tags('Opinion');  
                 $post_with_given_id = DB::table('opinions as o')                
                 ->join('authors as a', 'a.id', '=', 'o.author_id') 
                 ->select('o.*','a.name','a.lastname','a.img as aimg', 'o.img as oimg' )
                 ->where('o.lang_id','=', $lng )
                 ->orderBy('date','DESC')  
                 ->paginate(6); 
                          
                 $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                                
                 $all_data=array("lang"=> $lang, "event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
                   return view('all_opinions')-> with('all_last_posts',$all_data);
        }
        else{               
            return  redirect('/'.App::getLocale());
            }

         }

         public function videos($locale) 
         {
             $rules = ['en','ru','hy'];                      
             if(in_array($locale,$rules))
             {
                 Session::put('locale',$locale);
                 App::setLocale($locale);
                 $lang = App::getLocale();     
                    
                      $id=trans('text.videos');
                      $lng =Post::getLangId(); 
                      $calendar= Event::event($lang);
                      $menu = Post::menu();
                      $categories = Post :: categories();
                      $popular_tags=Tags::load_popular_tags('Video');  
                      $post_with_given_id = DB::table('videos as o')                
                      ->join('authors as a', 'a.id', '=', 'o.author_id') 
                      ->select('o.*','a.name','a.lastname','a.img as aimg', 'o.img as oimg' )
                      ->where('o.lang_id','=', $lng )
                      ->orderBy('date','DESC')  
                      ->paginate(6);    
                               
                      $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                              
                      $all_data=array("lang"=> $lang, "event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
                        return view('all_videos')-> with('all_last_posts',$all_data);
             }
             else{               
                 return  redirect('/'.App::getLocale());
                 }
     
              }

              public function announcements($locale) 
                    {
                        $rules = ['en','ru','hy'];                      
                        if(in_array($locale,$rules))
                        {
                            Session::put('locale',$locale);
                            App::setLocale($locale);
                            $lang = App::getLocale(); 
                            $id=trans('text.announcements');
                            $lng =Post::getLangId(); 
                            $calendar= Event::event($lang);
                            $menu = Post::menu();
                            $categories = Post :: categories();
                            $popular_tags=Tags::load_popular_tags('Announcement');  
                            $all_announcements = DB::table('announcements as o')                
                            ->join('authors as a', 'a.id', '=', 'o.author_id') 
                            ->select('o.*','a.name','a.lastname','a.img as aimg', 'o.img as oimg' )
                            ->where('o.lang_id','=', $lng )
                            ->orderBy('date','DESC')  
                            ->paginate(6);                
                                    
                            $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                         
                            $all_data=array("lang"=> $lang,
                             "event"=> $calendar,
                             "post"=>$all_announcements,
                             "menu"=>$menu,
                             "id"=>$id,
                             "mostViewed"=> $mostViewed, 
                             "categories"=>$categories,
                             "popular_tags"=> $popular_tags,
                             "folder"=>'announcement',
                        
                        ); 

                                return view('all_announcements')-> with('all_last_posts',$all_data);
                        }
                        else{               
                            return  redirect('/'.App::getLocale());
                            }
                
              }

              public function news($locale) 
              {
                  $rules = ['en','ru','hy'];                      
                  if(in_array($locale,$rules))
                  {
                      Session::put('locale',$locale);
                      App::setLocale($locale);
                      $lang = App::getLocale(); 
                      $id=trans('text.news');
                      $land_id =Post::getLangId(); 
                      $calendar= Event::event($lang);
                      $menu = Post::menu();
                      $categories = Post :: categories();
                      $popular_tags=Tags::load_popular_tags('News');  
                      $all_news = DB::table('news as o')                
                      ->join('authors as a', 'a.id', '=', 'o.author_id') 
                      ->select('o.*','a.name','a.lastname','a.img as aimg', 'o.img as oimg' )
                      ->where('o.lang_id','=', $land_id )
                      ->orderBy('date','DESC')  
                      ->paginate(6);                
                      $lng=Post::getLangId();               
                      $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                                
                      $all_data=array("lang"=> $lang,
                       "event"=> $calendar,
                       "post"=>$all_news,
                       "menu"=>$menu,
                       "id"=>$id,
                       "mostViewed"=> $mostViewed, 
                       "categories"=>$categories,
                       "popular_tags"=> $popular_tags,
                       "folder"=>'news',
                  
                  ); 

                          return view('all_news')-> with('all_last_posts',$all_data);
                  }
                  else{               
                      return  redirect('/'.App::getLocale());
                      }
          
        }
        public function partners($locale) 
        {
            $rules = ['en','ru','hy'];                      
            if(in_array($locale,$rules))
            {
                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale();
                $lng =Post::getLangId(); 
                $calendar= Event::event($lang);
                $menu = Post::menu();
                $categories = Post :: categories();               
                          
                $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
              
                $authors =DB::table('partners')
                    ->select('*')
                    ->where('lang_id','=',$lng)
                    ->paginate(8);
                $all_data=array("lang"=> $lang,
                'authors' => $authors,
                'menu'=>$menu,
                "mostViewed"=> $mostViewed,               
                "event"=> $calendar,
                "lang"=> $lang,
                 "text"=> trans('text.partners')
            ); 

                    return view('partners')-> with('all_last_posts',$all_data);
            }
            else{               
                return  redirect('/'.App::getLocale());
                }
    
  }


        public function openArchieve($locale,$date) 
            {  $rules = ['en','ru','hy'];                      
                if(in_array($locale,$rules))
                {
                   Session::put('locale',$locale);
                    App::setLocale($locale);
                    $lang = App::getLocale();
                    $calendar= Event::event($lang);
                    $menu = Post::menu();
                    $categories = Post :: categories();
                    $popular_tags=Tags::load_popular_tags('Post');  
                    $posts_archieve= Archieve::get_archieves('posts',$date);    
                    $videos_archieve= Archieve::get_archieves('videos',$date);              
                    $announs_archieve= Archieve::get_archieves('announcements',$date);              
                    $news_archieve= Archieve::get_archieves('news',$date); 
                    $lng=Post::getLangId();               
                    $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                  
            
            $all_data=array("lang"=> $lang,
             "event"=> $calendar,
             "post"=>$posts_archieve,
             "videos"=>$videos_archieve,
             "menu"=>$menu,
             "mostViewed"=> $mostViewed, 
             "categories"=>$categories,
             "popular_tags"=> $popular_tags,
             "announcements"=>$announs_archieve,
             "news"=> $news_archieve
            
            );              
       
           //return count($all_data['announcements']);
           return view('archieves')-> with('all_last_posts',$all_data);
        }
        else{
              return  redirect('/'.App::getLocale());
            }
             

            }  
            

            public function posts_whith_current_tag($locale,$tagName)

            { 
                $rules = ['en','ru','hy'];                      
                if(in_array($locale,$rules))
                {
                        Session::put('locale',$locale);
                        App::setLocale($locale);
                        $lang = App::getLocale();
                        $lng = Post:: getLangId(); 
                        $categories = Post :: categories();
                        
                        $menu = Post::menu();
                        $calendar= Event::event($lang);       
                        // $all_posts = Post::have_this_tag($tagName);
                        $popular_tags=Tags::load_all_popular_tags();                
                                   
                        $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                      
                        $all_Post = Post::with('getAuthors')->whereHas('tags', function($query) use ($tagName) {
                            $query->whereName($tagName);
                        })->paginate(6);                          
                        $all_Video = Video::whereHas('tags', function($query) use ($tagName) {
                            $query->whereName($tagName);
                        })->paginate(6); 
                        $all_Opinion = Opinion::whereHas('tags', function($query) use ($tagName) {
                            $query->whereName($tagName);
                        })->paginate(6);
                        $all_Announ = Announcement::whereHas('tags', function($query) use ($tagName) {
                            $query->whereName($tagName);
                        })->paginate(6);
                        $all_News = News::whereHas('tags', function($query) use ($tagName) {
                            $query->whereName($tagName);
                        })->paginate(6);
 
               
            $all_data=array("lang"=> $lang,
            "event"=> $calendar,
            "post"=>$all_Post,
            "videos"=>$all_Video,
            "menu"=>$menu,
            "mostViewed"=> $mostViewed, 
            "categories"=>$categories,
            "popular_tags"=> $popular_tags,
            "announcements"=>$all_Announ,
            "news"=> $all_News,
            "opinions"=>$all_Opinion
           
           );              

        // return $all_posts;    
                return view('posts_have_tag')-> with('all_last_posts',$all_data);
            
                }
                else{              
                    return  redirect('/en');
                    } 
                }



}
