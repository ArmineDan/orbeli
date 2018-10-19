<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
    static function load_popular_tags(){
        return $load_popular_tags = DB::select("SELECT `name` FROM `tags` GROUP BY `name` HAVING COUNT(`name`) > 1 ORDER BY COUNT(`name`) DESC LIMIT 15");
  
     }     
}
