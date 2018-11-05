<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App;

class DashBoardController extends Controller
{
    //
    public function dashboard() {

        $locale =  App::getLocale();
        $categories = Category::all();
        return view('admin.dashboard', [
            'categories'=>$categories,
            'locale' => $locale,
        ]);
    }
}
