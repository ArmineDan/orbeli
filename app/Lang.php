<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use App\Post;
use DB;

class Lang extends Model
{
    static function getLangId() {
        $lang= App::getLocale();     
        return  $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');  
    }
}
