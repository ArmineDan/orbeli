<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class DashBoardController extends Controller
{
    //
    public function dashboard() {

        $categories = Category::all();
        return view('admin.dashboard', [
            'categories'=>$categories,
        ]);
    }
}
