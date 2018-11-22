<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Lang;
use App\Author;
use App\Document;
use App\Comment;
use Validator;
use App;


class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $validImageExp = ['jpg','png','jpeg','pjpeg','bmp', 'gif', 'svg'];

    public function index($locale)
    {
        $lang_id = Lang::getLangId();

        $announcement = DB::select("SELECT * FROM announcements WHERE lang_id='$lang_id'");

        return view('admin.announcements.index',[
            'locale' => $locale,
            'announcement' => $announcement,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale)
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'announcements')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;

        $lang_id = Lang::getLangId();
        $folder_name = 'announcements';
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);

        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $authors = DB::select("SELECT * FROM authors WHERE lang_id='$lang_id'");

        return view('admin.announcements.create',[
            'locale' => $locale,
            'last_id' => $last_id,
            'folder_name' => $folder_name,
            'imageurls' => $imageurls,
            'authors' => $authors,
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
        //return $locale;
        $this->validate($request,[
            'title' => 'required',
            'short_text' => 'required',
            'html_code' => 'required',

            'img' => 'required',
            'date' => 'required',
            'status' => 'required',

            'meta_k' => 'required',
            'meta_d' => 'required',
            'view' => 'required',

            'a_duration' => 'required',
            'post_typ' => 'required',
            'author_id' => 'required',

            'lang_id' => 'required'

        ]);
        $announcements = new Announcement;

        $paraParams = [
            'title' => $request->input('title'),
            'short_text' => $request->input('short_text'),
            'html_code' => $request->input('html_code'),

            'img' => $request->input('img'),
            'date' => $request->input('date'),
            'status' => $request->input('status'),

            'meta_k' => $request->input('meta_k'),
            'meta_d' => $request->input('meta_d'),
            'view' => $request->input('view'), 

            'a_duration' => $request->input('a_duration'),
            'post_typ' => $request->input('post_typ'),
            'author_id' => $request->input('author_id'),

            'lang_id'=> $request->input('lang_id'),

        ];

        DB::table('announcements')->insert( $paraParams );

        return redirect()->route('admin.announcements.index', $locale);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */
    public function show($id, $locale)
    {
        $announcement = Announcement::findOrFail($id);
        $lang_id = $announcement->lang_id;

        $comments = Announcement::find($announcement->id)->getComments()->get();
        $folder_name = "announcements";
        $files = Storage::files('public/'.$folder_name.'/'.$announcement->id);
        $fileurls = [];

        for ($i=0; $i < count($files) ; $i++) {
            $fileurls[$i]['url'] = Storage::url($files[$i]);
            $fileurls[$i]['size'] = $size = Storage::size($files[$i]);
            if(!in_array(Document::getTypeFromLink($files[$i]), $this->validImageExp)) {
                if(!DB::table('documents')->where('link',  Storage::url($files[$i]) )->where('documentable_type','App\Announcement')->exists()) {
                    // return 'into if';
                    Announcement::findOrFail($announcement->id)->getDocuments()->create(Document::prepareDocParams(Storage::url($files[$i])));
                }
            }            
        }
        
        $docsObject = Announcement::findOrFail($announcement->id)->getDocuments()->get(); // don't change this position //
        
        return view('admin.announcements.show', [
            'announcement' => $announcement,
            'locale' => $locale,
            'fileurls' => $fileurls,
            'docsObject' => $docsObject,
            'comments' => $comments,
            'folder_name' => $folder_name,
        ]);
        // return 'Show News-'. $news_id . ' | lng: ' .$locale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */

    public function edit($id, $locale)

    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'announcements')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;

        $folder_name = 'announcements';
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);

        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $announcement = Announcement::find($id);

        App::setLocale($locale);

        $lang_id = $announcement->lang_id;
        $authors = Author::where('lang_id', $lang_id)->get();

        return view('admin.announcements.edit',[
            'announcement' => $announcement,
            'locale'=> $locale,
            'last_id' =>$last_id,
            'folder_name' =>$folder_name,
            'imageurls' => $imageurls,
            'authors' => $authors,
            'lang_id' => $lang_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'short_text' => 'required',
            'html_code' => 'required',
            'img' => 'required',
            'date' => 'required',
            'status' => 'required',
            'meta_k' =>  'required',
            'meta_d' =>  'required',
            'a_duration' =>  'required',
            'author_id' =>  'required',
            'post_typ' => 'required',
            'view' => 'required'
        ]);
        
        $announcement = Announcement::find($id);
            $announcement->title = $request->input('title');
            $announcement->short_text = $request->input('short_text');
            $announcement->html_code = $request->input('html_code');
            $announcement->img = $request->input('img');
            $announcement->date = $request->input('date');
            $announcement->status = $request->input('status');
            $announcement->meta_k = $request->input('meta_k');
            $announcement->meta_d = $request->input('meta_d');
            $announcement->a_duration = $request->input('a_duration');
            $announcement->author_id = $request->input('author_id');
            $announcement->post_typ = $request->input('post_typ');
            $announcement->view = $request->input('view');
        $announcement->save();

        return redirect()->route('admin.announcements.index', $locale)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();
        return redirect()->route('admin.announcements.index', $locale);
    }
}
