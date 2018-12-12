<?php

namespace App;
use App;
use DB;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $table="authors";
    public $timestamps = false;

    static function authors_posts($id){
        $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id'); 
      $authors_posts =  Author::with('posts')->where('id','=',$id)->limit(3)->get();   
		
        return $authors_posts;
    } 
    
    static function all_authors_posts($auth_id,$db_name){
        $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');      
         
		 if ($db_name == 'posts'){
			 
		$authors_posts =  Author::with('posts')->where('id','=',$auth_id)->get();   
		
        return $authors_posts;
		 }
		 else{
			return  $authors_posts = DB::table( $db_name.' as p')
         ->select('p.*','a.name','a.lastname','a.img as aimg', 'p.img as oimg' )   
        ->join('authors as a', 'a.id', '=', 'p.author_id')                       
        ->where('p.author_id','=', $auth_id) 
		->where('p.status','<>','not_published')
        ->where('p.lang_id','=', $lng)  
        ->orderBy('date','DESC')          
        ->paginate(3);		 
			 
		 }
        
    }

    // Обратные поли-отношения Авторов многие-ко-многим
    public function posts() {
        return $this->morphedByMany('App\Post', 'authorable')->where('status','<>','not_published')->orderBy('date','DESC');
    }

    public function videos() {
        return $this->morphedByMany('App\Video', 'authorable');
    }

    public function opinions() {
        return $this->morphedByMany('App\Opinion', 'authorable');
    }

    public function news() {
        return $this->morphedByMany('App\News', 'authorable');
    }

    public function announcements() {
        return $this->morphedByMany('App\Announcement', 'authorable');
    }
    

}
