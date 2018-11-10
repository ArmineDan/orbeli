<?php

namespace App;
use App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Archieve extends Model
{
    static function get_archieves($db_name,$date){
        $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');
        
        $archeve = DB::table( $db_name.' as p')
        ->join('authors as a', 'a.id', '=', 'p.author_id') 
        ->select('p.*','a.name','a.lastname','a.img as aimg', 'p.img as oimg' )                  
        ->where('p.date', $date) 
        ->where('p.lang_id', $lng)            
        ->paginate(6);

        return $archeve;
       
        }
      
    
}
