<?php

namespace App;
use App;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;



class Opinion extends Model
{
    static function load_all(){ 
        $lang= App::getLocale();
        $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');
        
        return $all_opinion = DB::table('opinions as o')          
        ->join('authors as a', 'o.author_id', '=', 'a.id')
        ->select('o.*','a.name','a.lastname','a.img as aimg','o.img as oimg')       
        ->orderBy('date', 'DESC')
        ->where('o.lang_id','=', $lng)
        ->limit(6)
        ->get();
    }


    //_Documents. Получить все документы ко мнению.
    public function getDocuments() {
        return $this->morphMany('App\Document', 'documentable');
    }

}
