<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    static function load_all(){
        
        
        return $all_opinion = DB::table('opinions')  
        ->select('opinions.*','authors.name','authors.lastname')       
        ->orderBy('date', 'DESC')
        ->join('authors', 'opinions.authors_id', '=', 'authors.id')
        ->limit(6)
        ->get();
       
        
        
    
      }

}
