<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use MaddHatter\LaravelFullcalendar\Calendar;
use App\Opinion;
use App\Author;
use App\Comment;
use App\Archieve;
use App\Announcement;
use App\Post;
use App\Tags;
use App\Lang;
use App\Video;
use App\News;
use App\About_us;
use Illuminate\Http\Request;
use App\Event;
use App;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

use App\NotFound;

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
            // вход в админку если юзер залогинен //                 
             if($locale === 'admin') {
                if (Auth::check()) {
                 // Пользователь вошёл в систему...
                 return redirect()->route('admin.index',App::getLocale());
                }
              }

            if(in_array($locale,$rules))
            {
                Session::put('locale',$locale);
                App::setLocale($locale);                        
                $lang= App::getLocale();
                $lng=Post::getLangId();
                $calendar= Event::event($lang);
                $opinions = Opinion::load_all();
                $last_posts_vertical = Post::verticalVideo();
                $menu = Post::menu();
                $LeftComments=  Post::LeftComments(); 
                $calendar= Event::event($lang);
                $opinions = Opinion::load_all();
                $last_posts_vertical = Post::verticalVideo();
                $menu = Post::menu();
                $LeftComments=  Post::LeftComments();                       

                $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                //return $mostViewed;
                $main_post =  Post::with('getAuthors')->where('status','main')->where('lang_id',$lng)->get();  
                $author = $main_post[0]->getAuthors;  
                $main_right =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('posts.id DESC')->limit(4)->get();  

                
                $main_video = Post::main_video();
                $contact = DB::select("SELECT * FROM contacts");
                $popular_tags=Tags::load_all_popular_tags();  
                $parralax = Post::parralax();  
                $get = PageController::take_id($main_right);
                
                $last_posts_xoragrer = Post::xoragreri_poster($get); 
                //return $last_posts_xoragrer; 
                $all_last_posts = array(
                    "vert"=>$last_posts_vertical,                            
                    "menu"=>$menu,
                    "leftComments" => $LeftComments,
                    "mostViewed"=> $mostViewed,
                    "main_post" => $main_post,
                    "main_video" => $main_video,                            
                    "main_right" => $main_right,
                    "popular_tags" => $popular_tags,                           
                    "opinions" => $opinions,
                    "event"=> $calendar,
                    "xoragrer"=>$last_posts_xoragrer,
                    "lang"=>$lang,
                    "parralax" => $parralax,
                    "contact" => $contact,
                    "author"=> $author,
                   // "notFound" => $notFound,
                );
                // return  $all_last_posts;
                return  view('index',compact('all_last_posts'));
            }
            else{
                // $lang = App::getLocale();  
                // $lang_id = Lang::getLangId();              
                // $calendar= Event::event($lang);
                // $menu = Post::menu();
                // $categories = Post :: categories();
                // $popular_tags = Tags::load_all_popular_tags();
                // $mostViewed =  Post::with('getAuthors')
                //                 ->where('status','published')
                //                 ->where('lang_id',$lang_id)
                //                 ->orderByRaw('view DESC')->limit(5)->get();
                // $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                // $all_data=array(
                //     "lang"=> $lang,
                //     "event"=> $calendar,
                //     "menu"=> $menu, 
                //     "mostViewed"=> $mostViewed,  
                //     "popular_tags"=> $popular_tags,
                //     "not_found_text" => $notFound[0]->error_text,
                //     "not_found" => true,
                // );
                // return view('errors.pageNotFound1')-> with('all_last_posts',$all_data);
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
                    $calendar= Event::event($lang);
                    $land_id =Post::getLangId(); 
                    $lng=Post::getLangId();
                    //return  $land_id;
                    $calendar= Event::event($lang);
                    $menu = Post::menu();
                    $categories = Post::categories();
                    $popular_tags=Tags::load_popular_tags('Post');
                    
                    $post_type =  DB::table('categories as c') 
                    ->where('c.name','=',$id)
                    ->value('id');
                    
                    $post_with_given_id = Post::with('getAuthors')
                    ->where('status','<>','not_published')
                    ->where('lang_id',$lng)
                    ->where('post_typ',$post_type)
                    ->paginate(6); 
                    //return $post_with_given_id->current_page;                    
                     
                    $mostViewed =  Post::with('getAuthors')->where('status','<>','not_published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                    $all_data=array("lang"=> $lang, "event"=> $calendar,"post"=>$post_with_given_id,"menu"=>$menu,"id"=>$id,"mostViewed"=> $mostViewed, "categories"=>$categories,"popular_tags"=> $popular_tags);              
                    
                    $all_data["not_found"] = false;
                    if($post_type === NULL ) {
                        
                        // $all_data=array(
                        //     "lang"=> $lang,
                        //     "event"=> $calendar,
                        //     "not_found" => true,                   
                        // );
                        // return view('errors.pageNotFound')-> with('all_last_posts',$all_data);                        
                        // return redirect()->action('PageController@index', $all_data);

                        /*
                        catch segment comes after /category/
                        */
                        $all_data["not_found"] = true;
                        $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                        $all_data["not_found_text"] = $notFound[0]->error_text;
                        return view('errors.pageNotFound1')-> with('all_last_posts',$all_data);

                    }
                    else{                                               
                        return view('current_posts')-> with('all_last_posts',$all_data);
                    }
                }
                else{                    
                    return  redirect('/'.App::getLocale());
                }                    
            }
            
    public function openCurrentPost_video($locale,$idd,$date,$title) 
        {
            $title=urldecode($title);
            $rules = ['en','ru','hy'];                      
            if(in_array($locale,$rules)) {

                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale(); 
                $lng=Post::getLangId();
                $calendar= Event::event($lang);
                $menu = Post::menu();
                $id = $idd;			
                //$id=Video::get_video_id($date,$title);					
                    
                $popular_tags=Tags::load_popular_tags('Video');   
                $post_with_given_dateANDtitle = Video::open_current_video_post($date,$title,$idd);
                $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
               
                if( settype($id, "integer") === NULL || Video::where('lang_id',$lng)->find($id) === null || Video::where('status','=','not_published')->find($id) == true ) {
                    $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                    $all_data=array(
                        "lang"=> $lang,
                        "event"=> $calendar,
                        "menu"=>$menu, 
                        "mostViewed"=> $mostViewed,  
                        "popular_tags"=> $popular_tags,
                        "not_found" => true,
                        "not_found_text" => $notFound[0]->error_text,
                    );
                    // return view('errors.pageNotFound')-> with('all_last_posts',$all_data);
                    return view('errors.pageNotFound1')-> with('all_last_posts',$all_data); 
                }
                else{
                    $comments = Video::find($id)->comments()->where('approved','>',0)->get();
                    $docs = Video::find($id)->getDocuments()->get();
                    $tags = Video::find($id)->tagArray;
                    DB::table('videos')->where('id','=',$id)->increment('view');
                    
                    $the_same_video_posts = Tags::the_same_posts($id,'Video','videos',$lng);
                    $all_data=array(
                        "lang"=> $lang,
                        "event"=> $calendar,
                        "post"=>$post_with_given_dateANDtitle,
                        "menu"=>$menu, 
                        "mostViewed"=> $mostViewed,  
                        "popular_tags"=> $popular_tags,
                        "comments"=> $comments,
                        "docs"=> $docs,
                        "tags"=> $tags,
                        "same_posts"=>$the_same_video_posts,
                        "id"=>$id,
                        "folder"=>'video'
                    );
                
                    // return $the_same_video_posts;
                    return view('openPostWith_dateANDtitle')-> with('all_last_posts',$all_data);
                }
            }
            else{              
                return  redirect('/'.App::getLocale());
            }                
                
        } 
            
        public function openCurrentPost_opinion($locale,$idd,$date,$title) 
        {
            $title=urldecode($title);
            $rules = ['en','ru','hy'];                      
            if(in_array($locale,$rules)) {

                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale(); 
                $lng=Post::getLangId();
                $calendar= Event::event($lang);
                $menu = Post::menu(); 
				$id=$idd;
                //$id=Opinion::get_opinion_id($date,$title);
    
                
                $popular_tags=Tags::load_popular_tags('Opinion');  
                $post_with_given_dateANDtitle = Opinion::open_current_opinion($date,$title,$idd);
                
                $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();

                if( settype($id, "integer")  === NULL || Opinion::where('lang_id',$lng)->find($id) === NULL || Opinion::where('status','=','not_published')->find($id) == true ) {

                    $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                    $all_data=array(
                        "lang"=> $lang,
                        "event"=> $calendar,
                        "menu"=>$menu, 
                        "mostViewed"=> $mostViewed,  
                        "popular_tags"=> $popular_tags,
                        "not_found_text" => $notFound[0]->error_text,
                        "not_found" => true,
                    );
                    return view('errors.pageNotFound1')-> with('all_last_posts',$all_data);
                }
                else{
                    $comments = Opinion::find($id)->comments()->where('approved','>',0)->get();
                    $docs = Opinion::find($id)->getDocuments()->get();
                    $tags = Opinion::find($id)->tagArray;
                    DB::table('opinions')->where('id','=',$id)->increment('view');
                    $the_same_video_posts = Tags::the_same_posts($id,'Opinion','opinions',$lng);

                    $all_data=array("lang"=> $lang,
                        "event"=> $calendar,
                        "post"=>$post_with_given_dateANDtitle,
                        "menu"=>$menu, 
                        "mostViewed"=> $mostViewed,  
                        "popular_tags"=> $popular_tags,
                        "comments"=> $comments,
                        "docs"=> $docs,
                        "tags"=> $tags,
                        "same_posts"=>$the_same_video_posts,
                        "id"=>$id,
                        "folder"=>'opinion',                               
                    );  
                    // return $the_same_video_posts;
                    return view('openPostWith_dateANDtitle')-> with('all_last_posts',$all_data);
                }
            }
            else{              
                return  redirect('/'.App::getLocale());
            }                
            
        } 

        public function openCurrentPost_announce($locale,$idd,$date,$title) 
        {
            $title=urldecode($title);
            $rules = ['en','ru','hy'];                      
            if(in_array($locale,$rules))
            {
                    Session::put('locale',$locale);
                    App::setLocale($locale);
                    $lang = App::getLocale();
                    $lng=Post::getLangId(); 
                    $calendar= Event::event($lang);
                    $menu = Post::menu();
					$id=$idd;
                    //$id=Announcement::get_announce_id($date,$title);                         
                                                    
                    $popular_tags=Tags::load_popular_tags('Announcement');  
                    $post_with_given_dateANDtitle = Announcement::open_current_announce($date,$title,$idd);
                    $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                    
                    if(settype($id, "integer")  === NULL || Announcement::where('lang_id',$lng)->find($id) === NULL || Announcement::where('status','=','not_published')->find($id) == true ) {

                        $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                        $all_data=array(
                            "lang"=> $lang,
                            "event"=> $calendar,
                            "menu"=>$menu, 
                            "mostViewed"=> $mostViewed,  
                            "popular_tags"=> $popular_tags,
                            "not_found_text" => $notFound[0]->error_text,
                            "not_found" => true,                       
                        );
                        return view('errors.pageNotFound1')-> with('all_last_posts',$all_data);
                    }
                    else{ 
                    $comments = Announcement::find($id)->comments()->where('approved','>',0)->get();
                    $docs = Announcement::find($id)->getDocuments()->get();
                    $tags = Announcement::find($id)->tagArray;
                    DB::table('announcements')->where('id','=',$id)->increment('view');
                    $the_same_video_posts = Tags::the_same_posts($id,'Announcement','announcements',$lng);

                    $all_data=array("lang"=> $lang,
                    "event"=> $calendar,
                    "post"=>$post_with_given_dateANDtitle,
                    "menu"=>$menu, 
                    "mostViewed"=> $mostViewed,  
                    "popular_tags"=> $popular_tags,
                    "comments"=> $comments,
                    "docs"=> $docs,
                    "tags"=> $tags,
                    "same_posts"=>$the_same_video_posts,
                    "id"=>$id,
                    "folder"=>'announcement'
                    );  
                    // return $the_same_video_posts;
                    return view('openPostWith_dateANDtitle')-> with('all_last_posts',$all_data);
                }
            }
            else{
                return  redirect('/'.App::getLocale());                
            }                
            
        } 
            
        public function openCurrentPost_news($locale,$idd,$date,$title) 
        {
            $title=urldecode($title);
            $rules = ['en','ru','hy'];                      
            if(in_array($locale,$rules))
            {
                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale(); 
                $lng=Post::getLangId();
                $calendar= Event::event($lang);
                $menu = Post::menu(); 
                $id=$idd;
                //$id=News::get_news_id($date,$title);
                                                  
                $popular_tags=Tags::load_popular_tags('News');  
                $post_with_given_dateANDtitle = News::open_current_announce($date,$title,$idd);
                $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                
                
                if(settype($id, "integer") === NULL || News::where('lang_id',$lng)->find($id) === NULL || News::where('status','=','not_published')->find($id) == true)
                {
                    $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                    $all_data=array(
                        "lang"=> $lang,
                        "event"=> $calendar,
                        "menu"=>$menu, 
                        "mostViewed"=> $mostViewed,  
                        "popular_tags"=> $popular_tags,
                        "not_found_text" => $notFound[0]->error_text,
                        "not_found" => true,              
                    );
                    return view('errors.pageNotFound1')-> with('all_last_posts',$all_data);
                    // return redirect()->action('PageController@index', $all_data);
                }
                else {
                $comments = News::find($id)->comments()->where('approved','>',0)->get();
                $docs = News::find($id)->getDocuments()->get();
                $tags = News::find($id)->tagArray;
                DB::table('news')->where('id','=',$id)->increment('view');
                $the_same_video_posts = Tags::the_same_posts($id,'News','news',$lng);
                $all_data=array(
                    "lang"=> $lang,
                    "event"=> $calendar,
                    "post"=>$post_with_given_dateANDtitle,
                    "menu"=>$menu, 
                    "mostViewed"=> $mostViewed,  
                    "popular_tags"=> $popular_tags,
                    "comments"=> $comments,
                    "docs"=> $docs,
                    "tags"=> $tags,
                    "same_posts"=>$the_same_video_posts,
                    "id"=>$id,
                    "folder"=>'news'
                );  
                // return $the_same_video_posts;
                return view('openPostWith_dateANDtitle')-> with('all_last_posts',$all_data);
                }
            }
            else{
                return  redirect('/'.App::getLocale());
            }              
        }


        public function openCurrentPost($locale,$idd,$date,$title) 
        {
            $title=urldecode($title);
            $rules = ['en','ru','hy'];                      
            if(in_array($locale,$rules))
            {
                Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale(); 
                $lng=Post::getLangId();               
                $calendar= Event::event($lang);
                $menu = Post::menu();                      
                $popular_tags=Tags::load_popular_tags('Post');  
                $id =$idd;
                //$id=Post::getid($date,$title);
                // dd('hey');
                  
                 
                $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  

                if(settype($id, "integer") === NULL || Post::where('lang_id',$lng)->find($id) === NULL || Post::where('status','=','not_published')->find($id) == true ) {
                    $notFound = NotFound::where('lang_id', '=',Post::getLangId())->get();
                    $all_data=array(
                        "lang"=> $lang,
                        "event"=> $calendar,
                        "menu"=> $menu, 
                        "mostViewed"=> $mostViewed,  
                        "popular_tags"=> $popular_tags,
                        "not_found_text" => $notFound[0]->error_text,
                        "not_found" => true,
                    );
                    return view('errors.pageNotFound1')-> with('all_last_posts',$all_data);
                }
                else{
                    $post_with_given_dateANDtitle =  Post::with('getAuthors')->where('status','<>','not_published')->where('lang_id',$lng)->where('id',$id)->get();  
                    $author = $post_with_given_dateANDtitle[0]->getAuthors; 
                    $comments = Post::find($id)->comments()->where('approved','>',0)->get();
                    $docs = Post::find($id)->getDocuments()->get();
                    $tags = Post::find($id)->tagArray;
                    DB::table('posts')->where('id','=',$id)->increment('view');                                          
                    $the_same_posts = Tags::the_same_posts($id,'Post','posts',$lng); 
					//return  $the_same_posts;
                    $all_data=array("lang"=> $lang,
                        "event"=> $calendar,
                        "post"=>$post_with_given_dateANDtitle,
                        "menu"=>$menu, 
                        "mostViewed"=> $mostViewed,  
                        "popular_tags"=> $popular_tags,
                        "comments"=> $comments,
                        "docs"=> $docs,
                        "tags"=> $tags,
                        "same_posts"=>$the_same_posts,
                        "id"=>$id,
                        "folder"=>'post',
                        "author"=>$author,
                    );  
                    // return $the_same_posts;

                    return view('openPostWith_dateANDtitle')-> with('all_last_posts',$all_data);
                }
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
                    $lng=Post::getLangId();            
                    $land_id =Post::getLangId();                  
                    $calendar= Event::event($lang);
                    $menu = Post::menu();
                    $categories = Post :: categories();
                    $popular_tags=Tags::load_all_popular_tags();  
                    $posts_archieve= Archieve::get_archieves('posts',$date);    
                    $videos_archieve= Archieve::get_archieves('videos',$date);              
                    $announs_archieve= Archieve::get_archieves('announcements',$date);              
                    $news_archieve= Archieve::get_archieves('news',$date); 
                    $opinions_archieve= Archieve::get_archieves('opinions',$date); 
                    $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
          //return  $opinions_archieve;
            $all_data=array(
             "lang"=> $lang,
             "event"=> $calendar,
             "post"=>$posts_archieve,
             "videos"=>$videos_archieve,
             "menu"=>$menu,
             "mostViewed"=> $mostViewed, 
             "categories"=>$categories,
             "popular_tags"=> $popular_tags,
             "announcements"=>$announs_archieve,
             "news"=> $news_archieve,
             "opinions"=>$opinions_archieve            
            );              
                  //return count($all_data['announcements']);
           return view('archieves')-> with('all_last_posts',$all_data);
        }
        else{
              return  redirect('/'.App::getLocale());
            } 
        }  
            
            public function allTags($locale) 
            {  $rules = ['en','ru','hy'];                      
                if(in_array($locale,$rules))
                {
                   Session::put('locale',$locale);
                    App::setLocale($locale);
                    $lang = App::getLocale();  
                    $lng=Post::getLangId();          
                    $land_id =Post::getLangId();                  
                    $calendar= Event::event($lang);
                    $menu = Post::menu();
                    $categories = Post :: categories();
                    $popular_tags=Tags::load_all_tags();  
                    $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                                
            $all_data=array("lang"=> $lang,
             "event"=> $calendar,
             "menu"=>$menu,
             "mostViewed"=> $mostViewed, 
             "categories"=>$categories,
             "popular_tags"=> $popular_tags, 
             "id"=>trans('text.tags')
             
            );              
       
         // return $all_data['popular_tags'] ;
           return view('allTags')-> with('all_last_posts',$all_data);
                }
                else{
                    return  redirect('/'.App::getLocale());
                }
            }  
        public function search($locale) 
            {       
                $rules = ['en','ru','hy'];                      
            if(in_array($locale,$rules))
                    {
                    Session::put('locale',$locale);
                        App::setLocale($locale);
                        $lang = App::getLocale();
                        $lng=Post::getLangId();            
                        $land_id =Post::getLangId();                  
                        $calendar= Event::event($lang);
                        $menu = Post::menu();
                        $categories = Post :: categories();
                        $popular_tags=Tags::load_all_popular_tags();                         
                        $mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                    
                $all_data=array("lang"=> $lang,
                "event"=> $calendar,               
                "menu"=>$menu,
                "mostViewed"=> $mostViewed, 
                "categories"=>$categories,
                "popular_tags"=> $popular_tags);  

             //return count($all_data['announcements']);
                return view('search')->with('all_last_posts',$all_data);
            }
         else {
            return  redirect('/'.App::getLocale());
            }                
        }  
            
            public function about_us($locale) 
            {                   
                $rules = ['en','ru','hy'];                      
                if(in_array($locale,$rules))
                {
                    Session::put('locale',$locale);
                    App::setLocale($locale);
                    $lang = App::getLocale();
                    $lang_id = Lang::getLangId();;                 
                    $calendar= Event::event($lang);
                    $menu = Post::menu();
                    $categories = Post::categories(); 
                    $about_us = DB::select("SELECT * FROM about_uses WHERE lang_id='$lang_id'");

                    $ns_1 = About_us::Sum();
                    $ns_2 = About_us::post_Count();
                    $ns_3 = About_us::auhor_Count();

                $all_data=array("post_count" => $ns_2, "author_count" => $ns_3, "sum_views" => $ns_1, "about_us" => $about_us, "lang"=> $lang,"event"=> $calendar,"menu"=>$menu, "categories"=>$categories);              

                   return view('about_us')-> with('all_last_posts',$all_data);
                }
                else{              
                    return  redirect('/'.App::getLocale());
                }         

            }
            
            public function contact($locale){
                $rules = ['en','ru','hy'];                      
                if(in_array($locale,$rules))
                {
                        Session::put('locale',$locale);
                        App::setLocale($locale);
                        $lang = App::getLocale();  
                        $lng=Post::getLangId();               
                        $calendar= Event::event($lang);
                        $menu = Post::menu();
                        $categories = Post::categories();
                        $lang_id = Lang::getLangId();
                        $cont = DB::select("SELECT * FROM contacts WHERE lang_id=$lang_id");
                
                $all_data=array("lang"=> $lang,"cont" => $cont,"event"=> $calendar,"menu"=>$menu, "categories"=>$categories);              
                   return view('contacts')->with('all_last_posts',$all_data);
                }
                else{              
                    return  redirect('/'.App::getLocale());
                }         
            }
			 
			
            public function pagenotfound() {
                return view('errors.pageNotFound');
            }
}
 
