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

        $folder_name = 'announcements';
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);

        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
        
        $lang_id = Lang::getLangId();
        $authors = DB::select("SELECT * FROM authors WHERE lang_id='$lang_id'");

        $allTags = Announcement::getTagsByLangId($lang_id);

        return view('admin.announcements.create',[
            'locale' => $locale,
            'last_id' => $last_id,
            'folder_name' => $folder_name,
            'imageurls' => $imageurls,
            'authors' => $authors,
            'lang_id' => $lang_id,
            'tags' => $allTags,
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
        
        $validator = $this->validate( $request, [
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
            'lang_id' => 'required',
            'tags'=> 'required',
        ]);

        $announcement = Announcement::on('mysql2')->create($request->all());
        $announcement_id = $announcement->id;
        
        if($request->input('tags')) {
            $tagsArray = $request->tags;
            $announcement->tag($tagsArray); // store-to-db

            // update lang_id into taggable_tags
            for ($i=0; $i < count($tagsArray); $i++) {
                DB::connection('mysql2')->table('taggable_tags')
                ->where('name', $tagsArray[$i])
                ->update(['lang_id' => $request->input('lang_id') ]);
            }
        }

        DB::connection('mysql2')->table('taggable_taggables')
        ->where('taggable_type', 'App\\Announcement')
        ->where('taggable_id', $announcement_id)
        ->update(['lang_id' => $request->input('lang_id') ]);

        // DB::table('announcements')->insert( $paraParams );
      

        // return $request->all();

        return redirect()->route('admin.announcements.index', [$announcement_id, $locale]);
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
                    Announcement::on('mysql2')->findOrFail($announcement->id)->getDocuments()->create(Document::prepareDocParams(Storage::url($files[$i])));
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

    public function edit(Request $request, $id, $locale)
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'announcements')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;

        $announcement = Announcement::findOrFail($id);
        // $has = App\Post::has('getDocuments')->get();
        // return $has;
        $lang_id = $announcement->lang_id;   
        $folder_name = "announcements";  
        $authors = Author::where('lang_id', $lang_id)->get();
        $docsObject = $announcement->getDocuments()->get();

        $allTagsArray = Announcement::getTagsByLangId($lang_id);
        $postTagsArray = $announcement->tagArray;
        $allTagsList = implode(',',$allTagsArray);
        $postTagsList = $announcement->tagList;      

        $images = Storage::files('public/'.$folder_name.'/'.$announcement->id);
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) { 
            if(in_array(Document::getTypeFromLink($images[$i]), $this->validImageExp)) {
                $imageurls[$i]['url'] = Storage::url($images[$i]);
                $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
            }            
        }
        // return $imageurls;
        if($announcement) {

            return view('admin.announcements.edit',[
                'announcement' => $announcement,
                'authors' => $authors,
                'locale' => $locale,
                'allTagsList' => $allTagsList,
                'postTagsList' => $postTagsList,
                'docsObject' => $docsObject,
                'folder_name' => $folder_name,
                'imageurls' => $imageurls,
                'atags' => $allTagsArray,
                'ptags' => $postTagsArray,
                'last_id' => $last_id,
                'lang_id' => $lang_id
            ]);

        } else {
            return view('404error');
        }        
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
        $validator = $this->validate($request,[
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
            'view' => 'required',
            'lang_id' => 'required',
            'tags'=> 'required|array',
        ]);

        $announcement = Announcement::on('mysql2')->findOrFail($id);
        $old_date = $announcement->date;
        $announcement->update($request->all());

        if($request->input('tags')) {
            if(!empty($request->input('tags'))) {
                $announcement->retag($request->input('tags'));

                // update lang_id into taggable_tags
                // $tagsArray = explode(',',$request->tags);
                $tagsArray = $request->tags;
                for ($i=0; $i < count($tagsArray); $i++) {
                    DB::connection('mysql2')->table('taggable_tags')
                    ->where('name', $tagsArray[$i])
                    ->update(['lang_id' => $request->input('lang_id') ]);
                }
            }            
        }

        DB::connection('mysql2')->table('taggable_taggables')
        ->where('taggable_type', 'App\\Announcement')
        ->where('taggable_id', $id)
        ->update(['lang_id' => $request->input('lang_id') ]);
    
        return redirect()->route('admin.announcements.index', [$id, $locale]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $announcement = Announcement::on('mysql2')->find($id);
        $announcement->delete();
        return redirect()->route('admin.announcements.index', $locale);
    }
}
