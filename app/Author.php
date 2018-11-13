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
    
   
    

}
