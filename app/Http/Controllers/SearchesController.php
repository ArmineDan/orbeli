<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App;
use App\Event;
use App\Tags;
use DB;

class SearchesController extends Controller
{
	public function getIndex( Request $request,$locale ) {
		$s = $request->query('s');

		    
		$rules = ['en','ru','hy'];                      
		if(in_array($locale,$rules))
		{       Session::put('search', $s);
				Session::put('locale',$locale);
				App::setLocale($locale);
				$lang = App::getLocale();            
				$lng =Post::getLangId();                  
				$calendar= Event::event($lang);
				$menu = Post::menu();
				$categories = Post :: categories();
				$popular_tags=Tags::load_all_popular_tags(); 	
				$mostViewed =  Post::with('getAuthors')->where('status','published')->where('lang_id',$lng)->orderByRaw('view DESC')->limit(5)->get();  
                
				
				// Query and paginate result
				$posts = DB::table('posts as p')
						->select('p.*','l.lng')
				         ->where('p.status','<>','not_published')
				         ->where('p.title', 'like', "%$s%")
						->orWhere('p.html_code', 'like', "%$s%")						
						->join('langs as l','p.lang_id','=','l.id')
						->paginate(3); 
						
				$all_data=array("lang"=> $lang,
				"event"=> $calendar,               
				"menu"=>$menu,
				"mostViewed"=> $mostViewed, 
				"categories"=>$categories,
				"popular_tags"=> $popular_tags,
				'post' => $posts,
				's' => $s);  
		//return  $posts;

			return view('search')->with('all_last_posts',$all_data);
		//return view('searches.index', ['posts' => $posts, 's' => $s ]);
				}

				else {
                    return  redirect('/'.App::getLocale());
                    }        
	}
}
