<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App;    
use App\Lang;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $folder_name = 'authors';

    public function index()
    {
        $lang_id = Lang::getLangId();
        $author = Author::orderBy('id','desc')->where('lang_id',$lang_id)->paginate(5);
        return view('admin.authors.index',[
            'locale' => App::getLocale(),
            'author' => $author,
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
                                WHERE   (TABLE_NAME = 'authors')");
        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $folder_name = $this->folder_name;
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);
        $imageurls = [];

        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $lang_id = Lang::getLangId();
        
        return view("admin.authors.create",[
            'locale' => \App::getLocale(),
            'last_id' =>$last_id,
            'imageurls' => $imageurls,
            'folder_name' => $folder_name,
            'lang_id' => $lang_id,
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
            'name' => 'required',
            'lastname' => 'required',
            'sub_name' => 'required',
            'img' => 'required',
            'biography' => 'required',
            'lang_id' => 'required',
            'faceebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'email' => 'required',
        ]);
        $author = new Author;
        // $author->setConnection('mysql2');

        $paraParams = [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'sub_name' => $request->input('sub_name'),
            'img' => $request->input('img'),
            'biography' => $request->input('biography'),
            'lang_id' => $request->input('lang_id'),
            'faceebook' => $request->input('faceebook'),
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
            'email' => $request->input('email'),
        ];
        DB::connection('mysql2')->table('authors')->insert( $paraParams );

        return redirect()->route('admin.authors.index', App::getLocale());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'authors')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $folder_name = $this->folder_name;
        $images = Storage::files('public/'.$folder_name.'/'.$id);
        $imageurls = [];


        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $author = Author::find($id);
        App::setLocale($locale);

        return view("admin.authors.edit",[
            'author' => $author,
            'locale'=>$locale,
            'last_id' =>$last_id,

            'imageurls' => $imageurls,
            'folder_name' => $folder_name,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'sub_name' => 'required',
            'img' => 'required',
            'biography' => 'required',
            'faceebook' => 'required',
            'twitter' =>  'required',
            'linkedin' =>  'required',
            'email' =>  'required'
        ]);
        
        $author = Author::on('mysql2')->find($id);
            $author->name = $request->input('name');
            $author->lastname = $request->input('lastname');
            $author->sub_name = $request->input('sub_name');
            $author->img = $request->input('img');
            $author->biography = $request->input('biography');
            $author->faceebook = $request->input('faceebook');
            $author->twitter = $request->input('twitter');
            $author->linkedin = $request->input('linkedin');
            $author->email = $request->input('email');
        $author->save();

        return redirect()->route('admin.authors.index', $locale)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $author = Author::on('mysql2')->find($id);
        $author->delete();
        return redirect()->route('admin.authors.index', $locale);
    }
}
