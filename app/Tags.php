<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
    static function load_popular_tags(){
    
       // return $load_popular_tags = DB::select("SELECT `name` FROM `tags` GROUP BY `name` HAVING COUNT(`name`) > 1 ORDER BY COUNT(`name`) DESC LIMIT 15"); 
       // GROUP BY (`taggable_taggables`.`tag_id`) HAVING COUNT(`taggable_taggables`.`tag_id`) > 1
       //ORDER BY COUNT(`taggable_taggables`.`tag_id`) DESC LIMIT 15
   
        return $load_popular_tags = DB::select("SELECT * FROM  `taggable_taggables` INNER JOIN  `taggable_tags` ON `taggable_taggables`.`tag_id` =`taggable_tags`.`tag_id`");
   
     }     
}
