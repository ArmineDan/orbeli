<?php

namespace App\Http\Controllers\Sitemap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\News;
use App\Opinion;
use App\Announcement;
use App\Video;

use Illuminate\Http\Response;

/*
*resource|| https://laravel-news.com/laravel-sitemap
*/
class SitemapController extends Controller
{
    public function index() {
        $post = Post::orderBy('updated_at', 'desc')->leftJoin('langs', 'posts.lang_id', '=', 'langs.id')->first();
        $news = News::orderBy('updated_at', 'desc')->leftJoin('langs', 'news.lang_id', '=', 'langs.id')->first();
        $opinion = Opinion::orderBy('updated_at', 'desc')->leftJoin('langs', 'opinions.lang_id', '=', 'langs.id')->first();        
        $announcement = Announcement::orderBy('updated_at', 'desc')->leftJoin('langs', 'announcements.lang_id', '=', 'langs.id')->first();
        $video = Video::orderBy('updated_at', 'desc')->leftJoin('langs', 'videos.lang_id', '=', 'langs.id')->first();

        // return $video;
        return response()->view('sitemap.index',
        [
            'post' => $post,
            'news' => $news,
            'opinion' => $opinion,
            'announcement' => $announcement,
            'video' => $video,

        ])->header('Content-Type', 'text/xml');
    }
}
