<?php

namespace App\Http\Controllers\Admin;

use App\Parralax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App;
use Illuminate\Support\Facades\Storage;
use App\Lang;

class ParralaxController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder_name = "parralax";
    protected $default_id = 1;

    public function index()
    {

        $lang_id = Lang::getLangId();
        $parralax = DB::select("SELECT * FROM parralaxes WHERE lang_id=$lang_id");
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       //
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

        // $last_id_array = DB::select("SELECT  AUTO_INCREMENT
        //                         FROM    information_schema.TABLES
        //                         WHERE   (TABLE_NAME = 'parralaxes')");

        // $last_id = $last_id_array[0]->AUTO_INCREMENT;
        
        $last_id = $this->default_id;        
        $folder_name = $this->folder_name;
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);
        $imageurls = [];


        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $parralax = Parralax::find($id);
        App::setLocale($locale);
        
        return view('admin.parralax.edit',[
            'last_id' =>$last_id,
            'folder_name' =>$folder_name,
            'imageurls' => $imageurls,
            'parralax' => $parralax,
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
     * @param  \App\parralax  $parralax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $locale)
    {
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
            'link' => 'required',
            'img' => 'required'
        ]);
        
        $parralax = Parralax::on('mysql2')->find($id);
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
    public function destroy()
    {
        //
    }
}
