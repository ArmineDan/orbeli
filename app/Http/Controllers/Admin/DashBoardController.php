<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App;
use App\Lang;
use App\Video;

class DashBoardController extends Controller
{
    //
    public function dashboard() {

        $locale =  App::getLocale();
        $lang_id = Lang::getLangId();
        $categories = Category::where('lang_id', '=', $lang_id)->get();
        $posts = Post::where('lang_id', '=', $lang_id)->get();
        $videos = Video::where('lang_id', '=',$lang_id)->get();

        return view('admin.dashboard', [
            'locale' => $locale,
            'categories'=>$categories,
            'posts' => $posts,
            'videos' => $videos,

        ]);
    }
}
