<?php

namespace App;
use App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Announcement extends Model
{
    use Taggable;

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

    static  function get_announce_id($date,$title)
    {
        return $get_announce_id = DB::table('announcements') 
            ->where('announcements.date','=', $date)
            ->where('announcements.title','=', $title)        
            ->value('id');
    }

    static function open_current_announce($date,$title){
        $lang= App::getLocale();
        $lng = DB::table('langs')
            ->where('lng','=',$lang)
            ->value('id');

            return $open_current_post = DB::table('announcements as p')          
            ->join('authors as a', 'p.author_id', '=', 'a.id')
            ->select('p.*','a.name','a.lastname','a.faceebook','a.twitter','a.linkedin','a.img as aimg','p.img as pimg')       
            ->where('p.lang_id','=', $lng)
            ->where('p.date','=', $date)
            ->where('p.title','=', $title)        
            ->get();


    }

}
