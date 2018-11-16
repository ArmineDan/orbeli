<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App;    
use App\Lang;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder_name = "news";

    public function index()
    {
        $lang_id = Lang::getLangId();
        $news = DB::select("SELECT * FROM news");
        return view('admin.news.index',[
            'locale' => App::getLocale(),
            'news' => $news,
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
                                WHERE   (TABLE_NAME = 'news')");
        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $folder_name = $this->folder_name;
        $lang_id = Lang::getLangId();
        $images = Storage::files('public/'.$folder_name);
        $imageurls = [];

        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        return view("admin.news.create",[
            'locale' => \App::getLocale(),
            'last_id' =>$last_id,
            'imageurls' => $imageurls,
            'folder_name' => $folder_name,
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
        //return $locale;
        $this->validate($request,[
            'title' => 'required',
            'html_code' => 'required',
            'short_text' => 'required',
            'img' => 'required',
            'thumb_img' => 'required',
            'date' => 'required',
            'status' => 'required',
            'meta_k' => 'required',
            'meta_d' => 'required',
            'view' => 'required',
            'n_duration' => 'required',
            'post_typ' => 'required',
            'author_id' => 'required',
            'lang_id' => 'required',
        ]);
        $news = new News;

        $paraParams = [
            'title' => $request->input('title'),
            'html_code' => $request->input('html_code'),
            'short_text' => $request->input('short_text'),
            'img' => $request->input('img'),
            'thumb_img' => $request->input('thumb_img'),
            'date' => $request->input('date'),
            'status' => $request->input('status'),
            'meta_k' => $request->input('meta_k'),
            'meta_d' => $request->input('meta_d'),
            'view' => $request->input('view'),
            'n_duration' => $request->input('n_duration'),
            'post_typ' => $request->input('post_typ'),
            'author_id' => $request->input('author_id'),
            'lang_id' => $request->input('lang_id'),
        ];

        DB::table('news')->insert($paraParams);

        return redirect()->route('admin.news.index', App::getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'news')");
        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $folder_name = $this->folder_name;
        $lang_id = Lang::getLangId();
        $images = Storage::files('public/'.$folder_name);
        $imageurls = [];

        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $news = News::find($id);
        App::setLocale($locale);
        
        return view('admin.news.edit',[
            'news' => $news,
            'locale'=>$locale,
            'last_id' => $last_id,
            'folder_name' =>$folder_name,
            'imageurls' => $imageurls,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $locale)
    {
        $this->validate($request,[
            'title' => 'required',
            'short_text' => 'required',
            'html_code' => 'required',
            'img' => 'required',
            'thumb_img' => 'required',
        ]);
        
        $news = News::find($id);
            $news->title = $request->input('title');
            $news->short_text = $request->input('short_text');
            $news->html_code = $request->input('html_code');
            $news->img = $request->input('img');
            $news->thumb_img = $request->input('thumb_img');
        $news->save();

        return redirect()->route('admin.news.index', $locale)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('admin.news.index', $locale);
    }
}
