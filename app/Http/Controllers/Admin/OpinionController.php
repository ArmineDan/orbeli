<?php

namespace App\Http\Controllers\Admin;

use App\Opinion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App;
use App\Lang;
use App\Post;
use App\Author;
use App\Event;
use App\Document;
use App\Comment;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class OpinionController extends Controller
{

    protected $folder_name = 'opinions';
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
        $opinions = Opinion::where('lang_id', '=', $lang_id)->orderBy('id', 'desc')->paginate(10);
        return view('admin.opinions.index', [
            'opinions' => $opinions,
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
            WHERE   (TABLE_NAME = 'opinions')
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

        $allTags = Post::getTagsByLangId($lang_id);

        return view('admin.opinions.create', [
            'opinion' => [],
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
            'html_code'=>'required|string',            
            'img'=>'required|string',
            'date'=>'required|date',
            'status'=>'required|alpha_dash|max:100',
            'meta_k'=>'nullable|max:500',
            'meta_d'=>'nullable|max:1000',
            'o_duration' => 'required|string',
            'post_typ'=>'required|integer',
            'author_id' => 'required|integer',
            'lang_id'=>'required|integer',
            'tags'=> 'required|array',
        ]);

        $opinion = Opinion::create($request->all());
        $opinion_id = $opinion->id;
        // return $opinion_id;

        // add tags to this Opinion
        if($request->input('tags')) {
            // $tagsString = $request->tags;
            // $tagsArray = explode(',',$request->tags);
            $tagsArray = $request->tags;
            $opinion->tag($tagsArray); // store-to-db

            // update lang_id into taggable_tags
            for ($i=0; $i < count($tagsArray); $i++) {
                DB::table('taggable_tags')
                ->where('name', $tagsArray[$i])
                ->update(['lang_id' => $request->input('lang_id') ]);
            }
        }

        // add date into Event if not exists
        Event::checkAndSaveIfNotExists($request->input('date'), $request->input('lang_id'));

        // update lang_id into taggable_taggables
        DB::table('taggable_taggables')
        ->where('taggable_type', 'App\\Opinion')
        ->where('taggable_id', $opinion_id)
        ->update(['lang_id' => $request->input('lang_id') ]);

        return redirect()->route('admin.opinion.show', [$opinion_id, App::getLocale()]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show($opinion_id, $locale)
    {
        $opinion = Opinion::findOrFail($opinion_id);
        $lang_id = $opinion->lang_id;
        // return $lang_id;

        $comments = Opinion::find($opinion->id)->getComments()->get();
        $files = Storage::files('public/'.$this->folder_name.'/'.$opinion->id);
        $fileurls = [];
        for ($i=0; $i < count($files) ; $i++) {
            $fileurls[$i]['url'] = Storage::url($files[$i]);
            $fileurls[$i]['size'] = $size = Storage::size($files[$i]);
            if(!in_array(Document::getTypeFromLink($files[$i]), $this->validImageExp)) {
                if(!DB::table('documents')->where('link',  Storage::url($files[$i]) )->where('documentable_type','App\Opinion')->exists()) {
                    // return 'into if';
                    Opinion::findOrFail($opinion->id)->getDocuments()->create(Document::prepareDocParams(Storage::url($files[$i])));
                }
            }            
        }

        $docsObject = Opinion::findOrFail($opinion->id)->getDocuments()->get(); // don't change this position //
        return view('admin.opinions.show', [
            'opinion' => $opinion,
            'locale' => $locale,
            'fileurls' => $fileurls,
            'docsObject' => $docsObject,
            'comments' => $comments,
            'folder_name' => $this->folder_name,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $opinion = Opinion::findOrFail($id);
        $lang_id = $opinion->lang_id;
        $authors = Author::where('lang_id', $lang_id)->get();
        $docsObject = $opinion->getDocuments()->get();

        $allTagsArray = Post::getTagsByLangId($lang_id);
        $opinionTagsArray = $opinion->tagArray;
        $allTagsList = implode(',',$allTagsArray);
        $opinionTagsList = $opinion->tagList;

        $images = Storage::files('public/'.$this->folder_name.'/'.$opinion->id);
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            if(in_array(Document::getTypeFromLink($images[$i]), $this->validImageExp)) {
                $imageurls[$i]['url'] = Storage::url($images[$i]);
                $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
            }            
        }

        return view('admin.opinions.edit',[
            'opinion' => $opinion,
            'authors' => $authors,
            'locale' => $locale,
            'allTagsList' => $allTagsList,
            'opinionTagsList' => $opinionTagsList,
            'docsObject' => $docsObject,
            'folder_name' => $this->folder_name,
            'imageurls' => $imageurls,
            'post_typ' => $this->post_typ,
            'atags' => $allTagsArray,
            'otags' => $opinionTagsArray,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $opinion_id, $locale)
    {
        $validator = $this->validate( $request, [
            'title'=>'bail|required|max:400',
            'short_text'=>'required|string',
            'html_code'=>'required|string',            
            'img'=>'required|string',
            'date'=>'required|date',
            'status'=>'required|alpha_dash|max:100',
            'meta_k'=>'nullable|max:500',
            'meta_d'=>'nullable|max:1000',
            'o_duration' => 'required|string',
            'post_typ'=>'required|integer',
            'author_id' => 'required|integer',
            'lang_id'=>'required|integer',
            'tags'=> 'required|array',
        ]);

        // return $request->all();
        $opinion = Opinion::findOrFail($opinion_id);
        $old_date = $opinion->date;

        $opinion->update($request->all());
        Event::checkAndSaveIfNotExists($request->input('date'), $request->input('lang_id'));
        Event::checkAndDeleteEventDate($old_date, $request->input('lang_id'));

        if($request->input('tags')) {
            if(!empty($request->input('tags'))) {
                $opinion->retag($request->input('tags'));

                // update lang_id into taggable_tags
                // $tagsArray = explode(',',$request->tags);
                $tagsArray = $request->tags;
                for ($i=0; $i < count($tagsArray); $i++) {
                    DB::table('taggable_tags')
                    ->where('name', $tagsArray[$i])
                    ->update(['lang_id' => $request->input('lang_id') ]);
                }
            }            
        }
        // update lang_id into taggable_taggables
        DB::table('taggable_taggables')
        ->where('taggable_type', 'App\\Opinion')
        ->where('taggable_id', $opinion_id)
        ->update(['lang_id' => $request->input('lang_id') ]);

        return redirect()->route('admin.opinion.edit', [$opinion->id, $locale]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy($opinion_id, $locale)
    {
        $opinion = Opinion::findOrFail($opinion_id);
        $date = $opinion->date;
        $lang_id = $opinion->lang_id;

        $opinion->getDocuments()->delete(); // 100
        $opinion->getComments()->delete(); // 100
        $opinion->detag(); // 100
        $opinion->delete(); // 100
        
        Event::checkAndDeleteEventDate($date, $lang_id); // 100
        return redirect()->route('admin.opinion.index', $locale);
    }
}
