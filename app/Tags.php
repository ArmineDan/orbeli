<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
    static function load_popular_tags(){
      
      
      
   return $load_popular_tags = DB::select("SELECT  `taggable_taggables`.tag_id, `taggable_tags`.`name` FROM `taggable_taggables`  INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`  GROUP BY `taggable_taggables`.`tag_id`,`taggable_tags`.`name`  HAVING COUNT(`taggable_taggables`.`tag_id`) > 1 ORDER BY COUNT(`taggable_taggables`.`tag_id`)  desc LIMIT 15 ");
   
     }     
}
