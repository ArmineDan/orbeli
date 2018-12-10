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
            'siteURL' => $this->siteURL(),

        ])->header('Content-Type', 'text/xml');
    }

    public function posts() {
        $posts = Post::leftJoin('langs', 'posts.lang_id', '=', 'langs.id')
                        ->select('posts.*', 'langs.lng')->get();

        return response()->view('sitemap.posts',[
            'posts' => $posts,
            'siteURL' => $this->siteURL(),
        ])->header('Content-Type', 'text/xml');
    }

    public function news() {
        $news = News::leftJoin('langs', 'news.lang_id', '=', 'langs.id')
                        ->select('news.*', 'langs.lng')->get();         
        return response()->view('sitemap.news',[
            'news' => $news,
            'siteURL' => $this->siteURL(),
        ])->header('Content-Type', 'text/xml');
    }

    public function opinions() {
        $opinions = Opinion::leftJoin('langs', 'opinions.lang_id', '=', 'langs.id')
                            ->select('opinions.*', 'langs.lng')->get();
        // return $opinions;
        return response()->view('sitemap.opinions',[
            'opinions' => $opinions,
            'siteURL' => $this->siteURL(),
        ])->header('Content-Type', 'text/xml');
    }

    public function announcements() {
        $announcements = Announcement::leftJoin('langs', 'announcements.lang_id', '=', 'langs.id')
                                    ->select('announcements.*', 'langs.lng')->get();
        // return $announcements;
        return response()->view('sitemap.announcements',[
            'announcements' => $announcements,
            'siteURL' => $this->siteURL(),
        ])->header('Content-Type', 'text/xml');
    }

    public function videos() {
        $videos = Video::leftJoin('langs', 'videos.lang_id', '=', 'langs.id')
                        ->select('videos.*', 'langs.lng')->get();
        // return $videos;
        return response()->view('sitemap.videos',[
            'videos' => $videos,
            'siteURL' => $this->siteURL(),
        ])->header('Content-Type', 'text/xml');
    }

    /** 
     * @return http(s)://example.com/ 
     */
    public function siteURL() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'].'/';
        return $protocol.$domainName;
    }

}
