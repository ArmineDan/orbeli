<?php

namespace App;
use App;
use DB;

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
      $authors_posts = DB::table('posts')
        ->select('*')
        ->where ('author_id','=', $id)
        ->where ('lang_id','=', $lng)
        ->orderBy('date','desc')
        ->limit(3)
        ->get();   
        return $authors_posts;
    } 
    
    static function all_authors_posts($auth_id,$db_name){
        $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');      
         
        return  $authors_posts = DB::table( $db_name.' as p')
         ->select('p.*','a.name','a.lastname','a.img as aimg', 'p.img as oimg' )   
        ->join('authors as a', 'a.id', '=', 'p.author_id')                       
        ->where('p.author_id','=', $auth_id) 
        ->where('p.lang_id','=', $lng)            
        ->paginate(3);
    } 
    
    

}
