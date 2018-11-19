<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function index(){
        $narek = DB::select("SELECT * FROM contacts");
        return view('contacts')->with('narek',$narek);
    }
}
