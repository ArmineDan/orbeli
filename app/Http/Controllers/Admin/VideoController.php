<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App;
use App\Lang;
use App\Post;
use App\Author;
use App\Document;
use App\Event;
use App\Comment;
use Validator;

class VideoController extends Controller
{

    protected $folder_name = 'videos';
    protected $validImageExp = ['jpg','png','jpeg','pjpeg','bmp', 'gif', 'svg'];
    protected $post_typ = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang_id = Lang::getLangId();
        $videos = Video::where('lang_id', '=', $lang_id)->orderBy('id', 'desc')->paginate(10);
        return view('admin.videos.index', [
            'videos' => $videos,
            'locale' => App::getLocale(),
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
        WHERE   (TABLE_NAME = 'videos')
        AND table_schema=DATABASE()");        
        $last_id = $last_id_array[0]->AUTO_INCREMENT;

        $folder_name = $this->folder_name;
        $images = Storage::files('public/'.$folder_name.'/'.$last_id); // this are images //
        // return $images;
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
        
        $lang_id = Lang::getLangId();
        $authors = Author::where('lang_id', $lang_id)->get();        

        // $allTagsColumn = DB::select("SELECT DISTINCT t1.name FROM taggable_tags AS t1 JOIN taggable_taggables AS t2 ON t1.tag_id = t2.tag_id WHERE t2.lang_id=$lang_id");
        // $allTags = [];
        // for ($i=0; $i < count($allTagsColumn); $i++) { 
        //     $allTags[$i] = $allTagsColumn[$i]->name;
        // }        
        $allTags = Post::getTagsByLangId($lang_id);

        return view('admin.videos.create', [
            'video' => [],
            'authors' => $authors,            
            'tags' => $allTags,
            'locale' => App::getLocale(),
            'lang_id' => $lang_id,
            'imageurls' => $imageurls,
            'last_id' => $last_id,
            'folder_name' => $folder_name,
            'post_typ' => $this->post_typ,
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
            'title'=>'bail|required|max:400',
            'short_text'=>'required|string',
            // 'long_text' => 'nullable|string',
            'html_code'=>'required|string',
            
            'img'=>'required|string',
            // 'thumb_img' =>'nullable|string',
            'date'=>'required|date',
            'status'=>'required|alpha_dash|max:100',
            'meta_k'=>'nullable|max:500',
            'meta_d'=>'nullable|max:1000',
            'duration'=>'required|string',
            // 'view' => 'required|integer',
            'post_typ'=>'required|integer',
            'author_id' => 'required|integer',
            'lang_id'=>'required|integer',
            'tags'=> 'required|string',
        ]);

        $video = Video::create($request->all());
        $video_id = $video->id;

        // add tags to this Video
        if($request->input('tags')) {
            // $tagsString = $request->tags;
            $tagsArray = explode(',',$request->tags);
            $video->tag($tagsArray); // store-to-db

            // update lang_id into taggable_tags
            for ($i=0; $i < count($tagsArray); $i++) {
                DB::table('taggable_tags')
                ->where('name', $tagsArray[$i])
                ->update(['lang_id' => $request->input('lang_id') ]);
            }
        }

        // add date into Event if not exists
        Event::checkAndSaveIfNotExists($request->input('date'));

        // update lang_id into taggable_taggables
        DB::table('taggable_taggables')
        ->where('taggable_type', 'App\\Video')
        ->where('taggable_id', $video_id)
        ->update(['lang_id' => $request->input('lang_id') ]);

        return redirect()->route('admin.video.show', [$video_id, App::getLocale()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($video_id, $locale)
    {
        $video = Video::findOrFail($video_id);
        $lang_id = $video->lang_id;
        // return $lang_id;

        $comments = Video::find($video->id)->getComments()->get();
        $files = Storage::files('public/'.$this->folder_name.'/'.$video->id);
        $fileurls = [];
        for ($i=0; $i < count($files) ; $i++) {
            $fileurls[$i]['url'] = Storage::url($files[$i]);
            $fileurls[$i]['size'] = $size = Storage::size($files[$i]);
            if(!in_array(Document::getTypeFromLink($files[$i]), $this->validImageExp)) {
                if(!DB::table('documents')->where('link',  Storage::url($files[$i]) )->where('documentable_type','App\Video')->exists()) {
                    // return 'into if';
                    Video::findOrFail($video->id)->getDocuments()->create(Document::prepareDocParams(Storage::url($files[$i])));
                }
            }            
        }
        $docsObject = Video::findOrFail($video->id)->getDocuments()->get(); // don't change this position //
        return view('admin.videos.show', [
            'video' => $video,
            'locale' => $locale,
            'fileurls' => $fileurls,
            'docsObject' => $docsObject,
            'comments' => $comments,
            'folder_name' => $this->folder_name,
        ]);

        // return 'hello show video - ' . $video_id . ' - lng - ' . $locale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {        
        $video = Video::findOrFail($id);        
        $lang_id = $video->lang_id;
        $authors = Author::where('lang_id', $lang_id)->get();
        $docsObject = $video->getDocuments()->get();

        $allTagsArray = Post::getTagsByLangId($lang_id);
        $allTagsList = implode(',',$allTagsArray);
        $videoTagsList = $video->tagList;

        $images = Storage::files('public/'.$this->folder_name.'/'.$video->id);
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) { 
            if(in_array(Document::getTypeFromLink($images[$i]), $this->validImageExp)) {
                $imageurls[$i]['url'] = Storage::url($images[$i]);
                $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
            }            
        }

        return view('admin.videos.edit',[
            'video' => $video,
            'authors' => $authors,
            'locale' => $locale,
            'allTagsList' => $allTagsList,
            'videoTagsList' => $videoTagsList,
            'docsObject' => $docsObject,
            'folder_name' => $this->folder_name,
            'imageurls' => $imageurls,
            'post_typ' => $this->post_typ,
        ]);
        // return 'hello edit video - ' . $id . ' - lng - ' . $locale;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $video_id, $locale)
    {        
        // return 'update video ' . $video_id . ' | ' . $locale;
        $validator = $this->validate( $request, [
            'title'=>'bail|required|max:400',
            'short_text'=>'required|string',
            // 'long_text' => 'nullable|string',
            'html_code'=>'required|string',
            
            'img'=>'required|string',
            // 'thumb_img' =>'nullable|string',
            'date'=>'required|date',
            'status'=>'required|alpha_dash|max:100',
            'meta_k'=>'nullable|max:500',
            'meta_d'=>'nullable|max:1000',
            // 'view' => 'required|integer',
            'post_typ'=>'required|integer',
            'author_id' => 'required|integer',
            'lang_id'=>'required|integer',
            'tags'=> 'required|string',
        ]);

        // return $request->all();
        $video = Video::findOrFail($video_id);
        $old_date = $video->date;

        $video->update($request->all());
        Event::checkAndSaveIfNotExists($request->input('date'));
        Event::checkAndDeleteEventDate($old_date);

        if($request->input('tags')) {
            if(!empty($request->input('tags'))) {
                $video->retag($request->input('tags'));

                // update lang_id into taggable_tags
                $tagsArray = explode(',',$request->tags);
                for ($i=0; $i < count($tagsArray); $i++) {
                    DB::table('taggable_tags')
                    ->where('name', $tagsArray[$i])
                    ->update(['lang_id' => $request->input('lang_id') ]);
                }
            }
        }

        // update lang_id into taggable_taggables
        DB::table('taggable_taggables')
        ->where('taggable_type', 'App\\Video')
        ->where('taggable_id', $video_id)
        ->update(['lang_id' => $request->input('lang_id') ]);

        return redirect()->route('admin.video.edit', [$video_id, $locale]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($video_id, $locale)
    {
        $video = Video::findOrFail($video_id);

        $video->getDocuments()->delete(); // 100
        $video->getComments()->delete(); // 100
        $video->detag(); // 100
        $video->delete(); // 100
        $date = $video->date;        
        Event::checkAndDeleteEventDate($date); // 100
        return redirect()->route('admin.video.index', $locale);
        
    }
}
