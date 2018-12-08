<?php

namespace App;
use App;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;



class Opinion extends Model
{

    use Taggable;
    protected $fillable = [
        'title', 'short_text', 'html_code', 'img', 'date', 'status', 'meta_k', 'meta_d', 'o_duration', 'view', 'post_typ', 'author_id', 'lang_id',
    ];
   
    static function load_all(){ 
        $lang= App::getLocale();
        $lng = DB::table('langs') 
        ->where('lng','=',$lang)
        ->value('id');
        
        return $all_opinion = DB::table('opinions as o')          
        ->join('authors as a', 'o.author_id', '=', 'a.id')
        ->select('o.*','a.name','a.lastname','a.img as aimg','o.img as oimg')       
        ->orderBy('id', 'DESC')
        ->where('o.lang_id','=', $lng)
        ->limit(6)
        ->get();
    }

    public function comments()
    {
      return $this->morphMany('App\Comment', 'commentable');
    }
    public function getDocuments() {
        return $this->morphMany('App\Document', 'documentable');
    }
    public function getComments() {
        return $this->comments();
    }
    public function getAuthors() {
        return $this->morphToMany('App\Author', 'authorable');
    }
    
    static  function get_opinion_id($date,$title)
    {
        return $get_video_id = DB::table('opinions') 
            ->where('opinions.date','=', $date)
            ->where('opinions.title','=', $title)        
            ->value('id');
    }

    static function open_current_opinion($date,$title,$idd){
        $lang= App::getLocale();
        $lng = DB::table('langs')
            ->where('lng','=',$lang)
            ->value('id');

            return $open_current_post = DB::table('opinions as p')          
            ->join('authors as a', 'p.author_id', '=', 'a.id')
            ->select('p.*','a.name','a.lastname','a.faceebook','a.twitter','a.linkedin','a.img as aimg','p.img as pimg')       
            ->where('p.lang_id','=', $lng)
            ->where('p.id','=', $idd)               
            ->get();
    }

    

}
