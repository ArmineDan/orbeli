<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $all_posts= DB::table('posts')->get();
        return view('welcome',compact('all_posts'));
    }
}
