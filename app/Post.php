<?php

namespace App;
use App;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Category;
use App\Lang;
use App\File;
use App\Document;
use Cviebrock\EloquentTaggable\Taggable;



class Post extends Model
{
    use Taggable;
   
    protected $fillable = [
        'title', 'short_text', 'html_code', 'img', 'thumb_img', 'date', 'status', 'meta_k', 'meta_d', 'view', 'post_typ', 'author_id', 'lang_id',
    ];


    static function addTagsToKeys($tags, $meta_k, $post_id) {
        DB::table('posts')
            ->where('id', $post_id)
            ->update(['meta_k' => $tags . ','.$meta_k]);
    }
  
    static function getLangId() {
        $lang= App::getLocale();     
        return  $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');  
    }

    static function verticalPost(){
        return $main_right = DB::table('videos')
        ->select('videos.*', 'authors.name', 'authors.lastname') 
        ->where('videos.status','<>','main')        
        ->join('authors', 'authors.id', '=', 'videos.author_id')
        ->orderByRaw('date DESC')   
        ->limit(2)
        ->get();  
    }
//    static function horintalPost(){
//     return $horintalPost = DB::table('posts')
//     ->where('status','<>','main')
//     ->orderByRaw('date DESC')
//     ->offset(2)
//     ->limit(3)
//     ->get();
//     }
  
    static function main_right(){
        $main_right = DB::table('posts')
        ->select('posts.*', 'authors.name', 'authors.lastname') 
        ->where('posts.status','<>','main')        
        ->join('authors', 'authors.id', '=', 'posts.author_id')
        ->orderByRaw('date DESC')   
        ->limit(4)
        ->get();
        return $main_right;
       
        }
      
  

    /** post relationsheeps START **/
        //_Categories. получить категорию статьи.
        public function getCategory() {
            return $this->hasOne('App\Category', 'id', 'post_typ');
        }

        public function getFiles() {
            return $this->hasMany('App\File', 'post_id', 'id');
        }

        //_Documents. Получить все документы статьи.
        public function getDocuments() {
            return $this->morphMany('App\Document', 'documentable');
        }
    /** post relationsheeps END **/

    static function categories(){
        return $categories = DB::select("SELECT categories.`name`, count(categories.`name`) as num FROM `posts` right join categories on `posts`.`post_typ`=categories.`id` GROUP BY categories.`name`");
    }
        
     // Получить все комментарии статьи.
    
    public function comments()
    {
      return $this->morphMany('App\Comment', 'commentable');
    }
    
   static function LeftComments(){
    return $comments =DB::table('posts')
    ->orderByRaw('date DESC')
    ->select('*')               
    ->join('authors', 'authors.id', '=', 'posts.author_id')
    ->get();
   }


    static function menu(){
            $lang= App::getLocale();
            $lng = DB::table('langs')
            ->where('lng','=',$lang)
            ->value('id');
          

            return $menu = DB::table('categories')
            ->where('lang_id','=',$lng)
            ->get();
        } 
        
    static function main_post(){
            return $main_post = DB::table('posts') 
            ->select('posts.*', 'authors.name', 'authors.lastname') 
            ->where('status','main')
            ->join('authors', 'posts.author_id', '=', 'authors.id') 
            ->get();
        } 
        static function main_video(){
            return $main_post = DB::table('videos') 
            ->select('videos.*', 'authors.name', 'authors.lastname') 
            ->where('status','=','main')
            ->join('authors', 'videos.author_id', '=', 'authors.id') 
            ->get();
        } 
   
        
    static function mostViewed(){
        return $mostViewed = DB::table('posts')
        ->select('posts.*', 'authors.name', 'authors.lastname') 
        ->orderByRaw('view DESC')
        ->limit(5)
        ->join('authors', 'authors.id', '=', 'posts.author_id')
        ->get();
    } 
    
    static function archievs(){
        return $archievs = DB::select( "SELECT 'date'  FROM `posts` GROUP BY 'date'  ");
        
        // return $archievs = DB::table('posts')
        // ->select('date') 
        // ->orderBy('date')
        // ->groupBy('date') 
        // ->where('status', 'archive')       
        // ->get();
    } 
    
    static function xoragreri_poster($get){
        $lang= App::getLocale();
        $lng = DB::table('langs')
            ->where('lng','=',$lang)
            ->value('id');

        $post_types = DB::table('categories')
        ->select('categories.id')
        ->where('categories.lang_id','=',$lng)
        ->get();

        $arr_posts=[];
        for($i=0; $i<count($post_types); $i++){
           $post_typ = $post_types[$i]->id;
            $post = DB::select( "SELECT * FROM `posts` WHERE `posts`.id not in ($get)  and  `posts`.post_typ =  $post_typ  and  `posts`.status != 'main' order by `posts`.date desc limit 1   ");
          if( count($post)>0){
               $arr_posts[$i] = $post;
          }
        }
        return $arr_posts;

    }

    static function open_current_post($date,$title){
        $lang= App::getLocale();
        $lng = DB::table('langs')
            ->where('lng','=',$lang)
            ->value('id');

            return $open_current_post = DB::table('posts as p')          
            ->join('authors as a', 'p.author_id', '=', 'a.id')
            ->select('p.*','a.name','a.lastname','a.img as aimg','p.img as pimg')       
            ->where('p.lang_id','=', $lng)
            ->where('p.date','=', $date)
            ->where('p.title','=', $title)        
            ->get();


    }
    static  function getid($date,$title)
    {
        return $open_current_post = DB::table('posts') 
            ->where('posts.date','=', $date)
            ->where('posts.title','=', $title)        
            ->value('id');
    }
    
    static function parralax(){
        $parralax = DB::select("SELECT * FROM parralaxes");
        return $parralax;
    }
    
}
