<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use DB;
use App\Lang;

class About_us extends Model
{
    protected $fillable = ['title', 'html_code','lang_id','id'];

    static function lang_static(){
        $lang_id = Lang::getLangId();
    }

    static function Sum(){
        $post_sum = DB::table('posts')->sum('view');
        $opinion_sum =  DB::table('opinions')->sum('view');
        $hayt_sum =  DB::table('announcements')->sum('view');
        $video_sum =  DB::table('videos')->sum('view');
        $news_sum =  DB::table('news')->sum('view');
        return $opinion_sum+$post_sum+$hayt_sum+$video_sum+$news_sum;
        //$opinion_sum = Opinion::count();
    }

    static function auhor_Count(){
        $author_count = DB::table('authors')->count();
        return $author_count;
    }

    static function post_Count(){
        $post_count = DB::table('posts')->count();
        return $post_count;
    }

}
