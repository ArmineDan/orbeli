<?php

namespace App;
use App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
    static function load_popular_tags(){ 
      $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');
            
   return $load_popular_tags = DB::select("SELECT  `taggable_taggables`.tag_id, `taggable_tags`.`name` FROM `taggable_taggables`  INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`  WHERE  `taggable_taggables`.`lang_id` = $lng  AND  `taggable_taggables`.`taggable_type` LIKE '%Post' GROUP BY `taggable_taggables`.`tag_id`,`taggable_tags`.`name`   ORDER BY COUNT(`taggable_taggables`.`tag_id`)     desc LIMIT 15  ");
   
     }    
     
    static function load_popular_video_tags(){ 
      $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');
            
   return $load_popular_video_tags = DB::select("SELECT  `taggable_taggables`.tag_id, `taggable_tags`.`name` FROM `taggable_taggables`  INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`  WHERE  `taggable_taggables`.`lang_id` = $lng  AND  `taggable_taggables`.`taggable_type` LIKE '%Video' GROUP BY `taggable_taggables`.`tag_id`,`taggable_tags`.`name`   ORDER BY COUNT(`taggable_taggables`.`tag_id`)     desc LIMIT 15  ");
   
     }    
     
     static function the_same_posts($post_id){ 

       $load_popular_tag = DB::select("SELECT `taggable_taggables`.tag_id FROM `taggable_taggables` WHERE `taggable_id` = $post_id");
       $pull_tags='';
       for ($i=0; $i < count($load_popular_tag) ; $i++) {     
     // $tags = DB::select("SELECT `taggable_taggables`.taggable_id FROM `taggable_taggables` WHERE `taggable_id` = $id and  `taggable_id` != $post_id");
     $pull[$i]=$load_popular_tag[$i]->tag_id;
     $pull_tags.=$load_popular_tag[$i]->tag_id.',';
   
    }
    $pull_tag = substr($pull_tags, 0, -1); //having COUNT(`taggable_taggables`.tag_id) = 2 
    $tags = DB::select("SELECT `posts`.`id` from `posts` inner join `taggable_taggables` on `posts`.`id` = `taggable_taggables`.`taggable_id`  where `taggable_taggables`.`tag_id` in  ($pull_tag)  AND  `taggable_taggables`.`taggable_id` != $post_id  AND  `taggable_taggables`.`taggable_type` LIKE '%Post'  group by `posts`.`id` ");
  
    if($tags!= null){
          for ($i=0; $i < count($tags) ; $i++) {


           $row = DB::table('posts')
          ->select('posts.*', 'authors.name', 'authors.lastname') 
          ->where('posts.status','<>','main') 
          ->where('posts.id','=',$tags[$i]->id)       
          ->join('authors', 'authors.id', '=', 'posts.author_id')
          ->get();  
           
          if(count($row)>0){
            $posts[$i]=$row;
          }
          
                  }
      }
    
       return $posts;

        }     
   
     static function the_same_video_posts($video_id){ 

      $load_popular_tag = DB::select("SELECT `taggable_taggables`.tag_id FROM `taggable_taggables` WHERE `taggable_id` = $video_id");
      $pull_tags='';

       for ($i=0; $i < count($load_popular_tag) ; $i++) {     
        // $tags = DB::select("SELECT `taggable_taggables`.taggable_id FROM `taggable_taggables` WHERE `taggable_id` = $id and  `taggable_id` != $post_id");
        $pull[$i]=$load_popular_tag[$i]->tag_id;
        $pull_tags.=$load_popular_tag[$i]->tag_id.',';
      
       }

       $pull_tag = substr($pull_tags, 0, -1); 

       if(strlen($pull_tag)>0)
       {

            $tags = DB::select("SELECT `videos`.`id` from `videos` inner join `taggable_taggables` on `videos`.`id` = `taggable_taggables`.`taggable_id`  where `taggable_taggables`.`tag_id` in  ($pull_tag)  and   `taggable_taggables`.`taggable_id` != $video_id  AND  `taggable_taggables`.`taggable_type` LIKE '%Video' group by `videos`.`id` ");
              
            if($tags!= null)
            {
                  for ($i=0; $i < count($tags) ; $i++) {   
                              $row = DB::table('videos')
                              ->select('videos.*', 'authors.name', 'authors.lastname') 
                              ->where('videos.status','<>','main') 
                              ->where('videos.id','=',$tags[$i]->id)       
                              ->join('authors', 'authors.id', '=', 'videos.author_id')
                              ->get();  
                                
                              if(count($row)>0){
                                $videos[$i]=$row;
                              }
                              
                          }
                     
              }
              return $videos;
         
   
           }     

       }//having COUNT(`taggable_taggables`.tag_id) = 2 
       
}
