<?php

namespace App\Http\Controllers\Admin;

use App\About_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App;    
use App\Lang;

class About_usController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder_name = "about_us";
    public function index()
    {
        $lang_id = Lang::getLangId();
        $about_us = DB::select("SELECT * FROM about_uses");

        return view('admin.about_us.index',[
            'locale' => App::getLocale(),
            'about_us' => $about_us,
        ]);
        return view('admin.about_us.index');
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
                                WHERE   (TABLE_NAME = 'about_uses')");
        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $folder_name = $this->folder_name;
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);
        $imageurls = [];

        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        return view("admin.about_us.create",[
            'locale' => \App::getLocale(),
            'last_id' =>$last_id,
            'imageurls' => $imageurls,
            'folder_name' => $folder_name,
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
        $this->validate($request,[
            'title' => 'required',
            'short_text' => 'required',
            'html_code' => 'required',
            'img' => 'required',
        ]);
        $about_us = new About_us;

        $paraParams = [
            'title' => $request->input('title'),
            'short_text' => $request->input('short_text'),
            'html_code' => $request->input('html_code'),
            'img' => $request->input('img'),
        ];

        DB::table('about_uses')->insert( $paraParams );

        return redirect()->route('admin.about_us.index', App::getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function show(About_us $about_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                 FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'about_uses')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        
        $lang_id = Lang::getLangId();
        $folder_name = 'about_us';
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);
        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
    
        $about_us = About_us::find($id);
        App::setLocale($locale);
        
        return view('admin.about_us.edit',[
            'about_us' => $about_us,
            'locale'=>$locale,
            'last_id' =>$last_id,
            'folder_name' =>$folder_name,
            'imageurls' => $imageurls,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
            'html_code' => 'required',
            'img' => 'required',
        ]);
        
        $about_us = About_us::find($id);
            $about_us->title = $request->input('title');
            $about_us->short_text = $request->input('text');
            $about_us->html_code = $request->input('html_code');
            $about_us->img = $request->input('img');
        $about_us->save();

        return redirect()->route('admin.about_us.index', $locale)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $about_us = About_us::find($id);
        $about_us->delete();
        return redirect()->route('admin.about_us.index', $locale);
    }
}
