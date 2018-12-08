<?php

namespace App;
use App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use DB;

class Tags extends Model
{
  use Taggable;

  static function load_all_popular_tags(){ 
    $lang= App::getLocale();
      $lng = DB::table('langs')
      ->where('lng','=',$lang)
      ->value('id');
             return $load_all_popular_tags = DB::select("SELECT  `taggable_taggables`.tag_id, `taggable_tags`.`name` FROM `taggable_taggables`  INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`  WHERE  `taggable_taggables`.`lang_id` = $lng GROUP BY `taggable_taggables`.`tag_id`,`taggable_tags`.`name`   ORDER BY COUNT(`taggable_taggables`.`tag_id`) desc LIMIT 15  ");
 
   }    
   
  static function load_all_tags(){ 
    $lang= App::getLocale();
      $lng = DB::table('langs')
      ->where('lng','=',$lang)
      ->value('id');
             return $load_all_popular_tags = DB::select("SELECT  `taggable_taggables`.tag_id, `taggable_tags`.`name` FROM `taggable_taggables`  INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`  WHERE  `taggable_taggables`.`lang_id` = $lng GROUP BY `taggable_taggables`.`tag_id`,`taggable_tags`.`name`");
 
   }    
   

    static function load_popular_tags($type){ 
      $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');
         return $load_popular_tags = DB::select("SELECT  `taggable_taggables`.tag_id, `taggable_tags`.`name` FROM `taggable_taggables`  INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`  WHERE  `taggable_taggables`.`lang_id` = $lng  AND  `taggable_taggables`.`taggable_type` LIKE '%$type' GROUP BY `taggable_taggables`.`tag_id`,`taggable_tags`.`name`   ORDER BY COUNT(`taggable_taggables`.`tag_id`)     desc LIMIT 15  ");
   
     }  
     
     static function get_intersect_status($post_id,$type,$load_popular_tag){
             if ($type == 'Post')     
             {
              $tags = Post::find($post_id)->tagArray;       
              $post_idies=[];
              for ($i=0; $i < count($load_popular_tag) ; $i++) {                    
                    $id=$load_popular_tag[$i]->id;					
                    $current_tags = Post::find($id)->tagArray;
                    $hatym = array_intersect($tags,$current_tags);
                    if(count($hatym)>=3){              
                      array_push($post_idies,$id);
                    }           
                }    
				
				
                $posts=array("posts"=>$post_idies, "tags"=>$tags);
             return $posts;
               }  
              elseif ($type == 'Video')
                {
                  $tags = Video::find($post_id)->tagArray;       
                  $post_idies=[];
                  for ($i=0; $i < count($load_popular_tag) ; $i++) {                    
                        $id=$load_popular_tag[$i]->id;
                        $current_tags = Video::find($id)->tagArray;
                        $hatym = array_intersect($tags,$current_tags);
                        if(count($hatym)>=3){              
                          array_push($post_idies,$id);
                        }           
                    }    
                    $posts=array("posts"=>$post_idies, "tags"=>$tags);
                  return $posts;
                   }  
             
              elseif ($type == 'Announcement'){
                  $tags = Announcement::find($post_id)->tagArray;       
                  $post_idies=[];
                  for ($i=0; $i < count($load_popular_tag) ; $i++) {                    
                        $id=$load_popular_tag[$i]->id;
                        $current_tags = Announcement::find($id)->tagArray;
                        $hatym = array_intersect($tags,$current_tags);
                        if(count($hatym)>=3){              
                          array_push($post_idies,$id);
                        }           
                    }    
                    $posts=array("posts"=>$post_idies, "tags"=>$tags);
                  return $posts;
                   }  
               elseif ($type == 'Opinion'){
                $tags = Opinion::find($post_id)->tagArray;       
                $post_idies=[];
                for ($i=0; $i < count($load_popular_tag) ; $i++) {                    
                      $id=$load_popular_tag[$i]->id;
                      $current_tags = Opinion::find($id)->tagArray;
                      $hatym = array_intersect($tags,$current_tags);
                      if(count($hatym)>=3){              
                        array_push($post_idies,$id);
                      }           
                  }    
                  $posts=array("posts"=>$post_idies, "tags"=>$tags);
                return $posts;
                 }  
               elseif ($type == 'News'){
                $tags = News::find($post_id)->tagArray;       
                $post_idies=[];
                for ($i=0; $i < count($load_popular_tag) ; $i++) {                    
                      $id=$load_popular_tag[$i]->id;
                      $current_tags = News::find($id)->tagArray;
                      $hatym = array_intersect($tags,$current_tags);
                      if(count($hatym)>=3){              
                        array_push($post_idies,$id);
                      }           
                  }    
                  $posts=array("posts"=>$post_idies, "tags"=>$tags);
                return $posts;
                 }  
     }

     static function the_same_posts($post_id,$type,$db,$lng)
          {  
             $post=[];                   
             $load_popular_tag = DB::select("SELECT id FROM $db WHERE id !=$post_id and status !='not_published' and lang_id=$lng ");
			
             $posts = Tags:: get_intersect_status($post_id,$type,$load_popular_tag);  
               
         // return $posts;
              if(count($posts['posts'])>0)
              { 
                $not_in = implode(",", $posts['posts']);
             //return  $not_in;
			
                 
                
                 for ($i=0; $i < count($posts['posts']) ; $i++) { }

                  for ($i=0; $i < count($posts['posts']) ; $i++) {                          
                        $row = DB::table($db)
                        ->select($db.'.*', 'authors.name', 'authors.lastname')                       
                        ->where($db.'.id','=',$posts['posts'][$i])       
                        ->join('authors', 'authors.id', '=', $db.'.author_id')
                        ->get();  

                        if(count($row)>0){
                            array_push($post,$row);                    
                        }  
                        if (count($post) == 4){
                          break;
                        }
                      }
					  
					  

                      if(4-count($posts['posts'])>0){
                                  $pull_tags='';
                                  for ($i=0; $i < 4-count($posts['posts']); $i++){ 
                                    
                                    $r=$posts['tags'][$i];   
                              $row = DB::select("SELECT `taggable_tags`.tag_id from `taggable_tags` WHERE `taggable_tags`.`name`= '$r' ");
                                    
                                    if(count($row)>0){
                                          $pull_tags.=$row[0]->tag_id.',';    
                                        }                                         
                                      } 
									 
                                                
                                    $pull_tag = substr($pull_tags, 0, -1); //having COUNT(`taggable_taggables`.tag_id) = 2 
									
                                    $roww =DB::select("SELECT $db.`id` from $db inner join `taggable_taggables` on $db.`id` = `taggable_taggables`.`taggable_id`  where  `taggable_taggables`.`taggable_id` not in ($not_in)  AND  `taggable_taggables`.`taggable_type` LIKE '%$type' AND  `taggable_taggables`.`tag_id` in ($pull_tag)  And `taggable_taggables`.`taggable_id`!= $post_id group by $db.`id` ");
                                     //return $roww;
					                 //die();									
                           
                                    for ($i=0; $i < count($roww); $i++) { 
                                      $postss = DB::table($db)
                                      ->select($db.'.*', 'authors.name', 'authors.lastname')                       
                                      ->where($db.'.id','=',$roww[$i]->id)       
                                      ->join('authors', 'authors.id', '=', $db.'.author_id')
                                      ->get();  

                                    
                                      if(count($postss)>0){
                                        array_push($post,$postss);    
                                                    
                                        } 
                                        if (count($post) > (4-count($posts['posts']))){
                                          break;
                                        } 
                                      
                                            }
                                }
               }


              return  $post;     
          }

         
  
  
  }
