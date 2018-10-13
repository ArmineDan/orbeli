<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
    //protected $table='posts';
   static function horintalPost(){
                return $horintalPost = DB::table('posts')
                ->orderByRaw('date DESC')
                ->limit(3)
                ->get();
    }
    static function verticalPost(){
        return $verticalPost = DB::table('posts')
        ->orderByRaw('date DESC')
        ->offset(3)
        ->limit(3)
        ->get();
   }

   static function categories(){
    return $categories = DB::select("SELECT post_type.`name`, count(post_type.`name`) as num FROM `posts` INNER join post_type on `posts`.`post_typ`=post_type.`id` GROUP BY post_type.`name`");
    
   }

   static function menu(){
    return $menu = DB::table('post_type')->get();
} 

    
}
