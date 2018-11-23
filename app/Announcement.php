<?php

namespace App;
use App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Announcement extends Model
{
    use Taggable;
    
    protected $fillable = [
        'title', 'short_text', 'html_code', 'img', 'date', 'status', 'meta_k', 'meta_d', 'view', 'a_duration', 'post_typ', 'author_id', 'lang_id',
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

    static function getLangId() {
        $lang= App::getLocale();     
        return  $lng = DB::table('langs')
        ->where('lng','=',$lang)
        ->value('id');  
    }

    static function getAllTagsByLangId($lang_id) {
        $allTagsArray = [];
        $allTagsColumn = DB::select("SELECT DISTINCT t1.name FROM taggable_tags AS t1 
                    JOIN taggable_taggables AS t2 ON t1.tag_id = t2.tag_id
                    WHERE t2.lang_id=$lang_id");
        for ($i=0; $i < count($allTagsColumn); $i++) { 
            $allTagsArray[$i] = $allTagsColumn[$i]->name;
        }
        return $allTagsArray;
    }

    static function getTagsByLangId($lang_id) {
        $allTags = [];
        $allTagsColumn = DB::select("SELECT name from taggable_tags where lang_id = ?", [$lang_id]);
        for ($i=0; $i < count($allTagsColumn); $i++) { 
            $allTags[$i] = $allTagsColumn[$i]->name;
        }
        return $allTags;
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
