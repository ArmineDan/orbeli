<?php

namespace App\Http\Controllers\Admin;

use App\Parralax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App;

class ParralaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$ns_post = \App\Post::all();
        // return App::getLocale();
        $parralax = DB::select("SELECT * FROM parralaxes");
        //return $ns_post;
        return view('admin.parralax.index',[
            'locale' => App::getLocale(),
            'parralax'=> $parralax,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/parralax/create",[
            'locale' => \App::getLocale()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
            'link' => 'required',
            'img' => 'required'
        ]);
        $post = new parralax;
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->link = $request->input('link');
        $post->img = $request->input('img');
        $post->save();

        return redirect('/posts')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\parralax  $parralax
     * @return \Illuminate\Http\Response
     */
    public function show(parralax $parralax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\parralax  $parralax
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {

        $parralax = Parralax::find($id);
        App::setLocale($locale);
        
        return view('admin.parralax.edit',[
            'parralax' => $parralax,
            'locale'=>$locale,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\parralax  $parralax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parralax $parralax)
    {
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
            'link' => 'required',
            'img' => 'required'
        ]);
        
        $post = Parralax::find($id);
            $post->title = $request->input('title');
            $post->text = $request->input('text');
            $post->link = $request->input('link');
            $post->img = $request->input('img');
        $post->save();

        return redirect('/posts')->with('success','Post created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parralax  $parralax
     * @return \Illuminate\Http\Response
     */
    public function destroy(parralax $parralax)
    {
        //
    }
}
