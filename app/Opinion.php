<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Document;

class Opinion extends Model
{
    static function load_all() {
        
        return $all_opinion = DB::table('opinions')  
        ->select('opinions.*','authors.name','authors.lastname')       
        ->orderBy('date', 'DESC')
        ->join('authors', 'opinions.author_id', '=', 'authors.id')
        ->limit(6)
        ->get();
    }

    //_Documents. Получить все документы ко мнению.
    public function getDocuments() {
        return $this->morphMany('App\Document', 'documentable');
    }

}
