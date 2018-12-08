<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App;
use App\Lang;
use App\Video;
use App\Opinion;
use App\News;
use App\Author;
use App\Partner;
use App\Parralax;
use App\Contact;
use App\About_us;
use App\Announcement;
use App\Comment;
use App\NotFound;

class DashBoardController extends Controller
{
    //
    public function dashboard() {

        $locale =  App::getLocale();
        $lang_id = Lang::getLangId();
        $categories = Category::where('lang_id', '=', $lang_id)->get()->count();
        $posts = Post::where('lang_id', '=', $lang_id)->get()->count();
        $videos = Video::where('lang_id', '=',$lang_id)->get()->count();
        $opinion = Opinion::where('lang_id', '=', $lang_id)->get()->count();
        $news = News::where('lang_id', '=', $lang_id)->get()->count();
        $authors = Author::where('lang_id', '=', $lang_id)->get()->count();
        $partners = Partner::where('lang_id', '=', $lang_id)->get()->count();
        $parallax = Parralax::where('lang_id', '=', $lang_id)->get()->count();
        $contacts = Contact::where('lang_id', '=', $lang_id)->get()->count();
        $aboutus = About_us::where('lang_id', '=', $lang_id)->get()->count();
        $announcements = Announcement::where('lang_id', '=', $lang_id)->get()->count();

        $comments = Comment::where('lang_id', '=', $lang_id)->where('approved', '=', 0)->get()->count();
        $not_found = NotFound::where('lang_id', '=', $lang_id)->get();
        $locale = App::getLocale();
        // return $not_found->count();

        return view('admin.dashboard', [
            'locale' => $locale,
            'categories'=>$categories,
            'posts' => $posts,
            'videos' => $videos,
            'opinion' => $opinion,
            'news' => $news,
            'authors' => $authors,
            'partners' => $partners,
            'parallax' => $parallax,
            'contacts' => $contacts,
            'aboutus' => $aboutus,
            'announcements' => $announcements,
            'comments' => $comments,
            'locale' => $locale,
            'not_found' => $not_found,
        ]);
    }
}
