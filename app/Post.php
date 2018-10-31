<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Category;
use Cviebrock\EloquentTaggable\Taggable;


class Post extends Model
{
   use Taggable;
  
    static function verticalPost(){
        return $verticalPost = DB::table('posts')
        ->where('status','<>','main')
        ->orderByRaw('date DESC')
        ->limit(2)
        ->get();
      
    }
   static function horintalPost(){
    return $horintalPost = DB::table('posts')
    ->where('status','<>','main')
    ->orderByRaw('date DESC')
    ->offset(2)
    ->limit(3)
    ->get();
    }
  
    public function getCategory() {
      return $this->hasOne('App\Category', 'id', 'post_typ');
    }


   static function categories(){
    return $categories = DB::select("SELECT categories.`name`, count(categories.`name`) as num FROM `posts` right join categories on `posts`.`post_typ`=categories.`id` GROUP BY categories.`name`");
    
   }
   static function LeftComments(){
    return $comments =DB::table('posts')
    ->orderByRaw('date DESC')
    ->select('*')               
    ->join('authors', 'authors.id', '=', 'posts.authors_id')
    ->get();
   }


    static function menu(){
            return $menu = DB::table('categories')->get();
        } 
        
    static function main_post(){
            return $main_post = DB::table('posts') 
            ->select('posts.*', 'authors.name', 'authors.lastname') 
            ->where('status','main')
            ->join('authors', 'posts.authors_id', '=', 'authors.id') 
            ->get();
        } 
   
        
    static function mostViewed(){
        return $mostViewed = DB::table('posts')
        ->select('posts.*', 'authors.name', 'authors.lastname') 
        ->orderByRaw('view DESC')
        ->limit(5)
        ->join('authors', 'authors.id', '=', 'posts.authors_id')
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
    
    
    
    

}
