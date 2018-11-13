<?php

namespace App\Http\Controllers\Admin;

use App\Parralax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App;
use Illuminate\Support\Facades\Storage;
use App\Post;

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
        //return App::getLocale();
        $parralax = DB::select("SELECT * FROM parralaxes");
        //return $ns_post;
        return view('admin.parralax.index',[
            'locale' => App::getLocale(),
            'parralax' => $parralax,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'parralaxes')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        // return $last_id;
        $lang_id = Post::getLangId();
        // return $lang_id;
        $folder_name = 'parralax';
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);
        // return $images;
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
        return view("admin/parralax/create",[
            'locale' => \App::getLocale(),
            'last_id' =>$last_id,
            'folder_name' =>$folder_name,
            'imageurls' => $imageurls,
            'lang_id' =>$lang_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        // return $locale;
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
            'link' => 'required',
            'img' => 'required',
            'lang_id' => 'required',
        ]);
        $parralax = new parralax;
        
        // $parralax->title = $request->input('title');
        // $parralax->text = $request->input('text');
        // $parralax->link = $request->input('link');
        // $parralax->img = $request->input('img');
        // $parralax->lang_id = $locale;
        // $parralax->save();

        $paraParams = [
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'img' => $request->input('img'),
            'link' => $request->input('link'),
            'lang_id' => $request->input('lang_id'),
        ];

        // $parralax->create($paraParams);
        DB::table('parralaxes')->insert( $paraParams );

        // echo 'ok';

        return redirect()->route('admin.parralax.index', App::getLocale());
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
        // return $id;
        // return $locale;
        $parralax = Parralax::find($id);
        // return $parralax;
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
    public function update(Request $request, $locale, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
            'link' => 'required',
            'img' => 'required'
        ]);
        
        $parralax = Parralax::find($id);
            $parralax->title = $request->input('title');
            $parralax->text = $request->input('text');
            $parralax->link = $request->input('link');
            $parralax->img = $request->input('img');
        $parralax->save();

        return redirect()->route('admin.parralax.index', $locale)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parralax  $parralax
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $parralax = Parralax::find($id);
        $parralax->delete();
        return redirect()->route('admin.parralax.index', $locale);
    }
}
