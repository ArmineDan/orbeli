<?php

namespace App;
use App;
use DB;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model

{
    use Taggable;
    protected $fillable = [
        'title', 'short_text', 'html_code', 'img', 'date', 'status', 'meta_k', 'meta_d', 'duration', 'view', 'post_typ', 'author_id', 'lang_id',
    ];

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

    static  function get_video_id($date,$title)
    {
        return $get_video_id = DB::table('videos') 
            ->where('videos.date','=', $date)
            ->where('videos.title','=', $title)        
            ->value('id');
    }
    static function open_current_video_post($date,$title){
        $lang= App::getLocale();
        $lng = DB::table('langs')
            ->where('lng','=',$lang)
            ->value('id');

            return $open_current_post = DB::table('videos as p')          
            ->join('authors as a', 'p.author_id', '=', 'a.id')
            ->select('p.*','a.name','a.lastname','a.faceebook','a.twitter','a.linkedin','a.img as aimg','p.img as pimg')       
            ->where('p.lang_id','=', $lng)
            ->where('p.date','=', $date)
            ->where('p.title','=', $title)        
            ->get();


    }
}
