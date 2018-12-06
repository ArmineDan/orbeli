<?php

namespace App\Http\Controllers\Admin;

use App\News;
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
use PhpParser\Node\Expr\New_;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder_name = "news";
    protected $validImageExp = ['jpg','png','jpeg','pjpeg','bmp', 'gif', 'svg'];
    protected $post_typ = 1;

    public function index()
    {
        $lang_id = Lang::getLangId();        
        $news = News::where('lang_id', '=', $lang_id)->orderBy('id', 'desc')->paginate(10);
        return view('admin.news.index',[
            'news' => $news,
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
            WHERE   (TABLE_NAME = 'news')
            AND table_schema=DATABASE()");        
        $last_id = $last_id_array[0]->AUTO_INCREMENT;       
        $images = Storage::files('public/'.$this->folder_name.'/'.$last_id); // this are images //

        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $lang_id = Lang::getLangId();
        $authors = Author::where('lang_id', $lang_id)->get();

        $allTags = Post::getTagsByLangId($lang_id);

        return view('admin.news.create', [
            'news' => [],
            'authors' => $authors,            
            'tags' => $allTags,
            'locale' => App::getLocale(),
            'lang_id' => $lang_id,
            'imageurls' => $imageurls,
            'last_id' => $last_id,
            'folder_name' => $this->folder_name,
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
        //return $locale;
        $this->validate($request,[
            'title' => 'required|max:400',
            'short_text' => 'required|string',
            'html_code' => 'required|string',
            'img' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|alpha_dash|max:100',
            'meta_k' => 'nullable|max:500',
            'meta_d' => 'nullable|max:1000',
            // 'view' => 'required',
            'n_duration' => 'required|string',
            'post_typ' => 'required|integer',
            'author_id' => 'required|integer',
            'lang_id' => 'required|integer',
            'tags'=> 'required|array',
        ]);
        // $news = new News;
        // $paraParams = [
        //     'title' => $request->input('title'),
        //     'html_code' => $request->input('html_code'),
        //     'short_text' => $request->input('short_text'),
        //     'img' => $request->input('img'),
        //     'thumb_img' => $request->input('thumb_img'),
        //     'date' => $request->input('date'),
        //     'status' => $request->input('status'),
        //     'meta_k' => $request->input('meta_k'),
        //     'meta_d' => $request->input('meta_d'),
        //     'view' => $request->input('view'),
        //     'n_duration' => $request->input('n_duration'),
        //     'post_typ' => $request->input('post_typ'),
        //     'author_id' => $request->input('author_id'),
        //     'lang_id' => $request->input('lang_id'),
        // ];
        // DB::table('news')->insert($paraParams);

        $news = News::on('mysql2')->create($request->all());
        $news_id = $news->id;

        if($request->input('tags')) {
            // $tagsString = $request->tags;
            // $tagsArray = explode(',',$request->tags);
            $tagsArray = $request->tags;
            $news->tag($tagsArray); // store-to-db

            // update lang_id into taggable_tags
            for ($i=0; $i < count($tagsArray); $i++) {
                DB::connection('mysql2')->table('taggable_tags')
                ->where('name', $tagsArray[$i])
                ->update(['lang_id' => $request->input('lang_id') ]);
            }
        }

        // add date into Event if not exists
        Event::checkAndSaveIfNotExists($request->input('date'), $request->input('lang_id'));

        // update lang_id into taggable_taggables
        DB::connection('mysql2')->table('taggable_taggables')
        ->where('taggable_type', 'App\\News')
        ->where('taggable_id', $news_id)
        ->update(['lang_id' => $request->input('lang_id') ]);

        return redirect()->route('admin.news.show', [$news_id, App::getLocale()] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($news_id, $locale)
    {
        $news = News::findOrFail($news_id);
        $lang_id = $news->lang_id;

        $comments = News::find($news->id)->getComments()->get();
        $files = Storage::files('public/'.$this->folder_name.'/'.$news->id);
        $fileurls = [];
        for ($i=0; $i < count($files) ; $i++) {
            $fileurls[$i]['url'] = Storage::url($files[$i]);
            $fileurls[$i]['size'] = $size = Storage::size($files[$i]);
            if(!in_array(Document::getTypeFromLink($files[$i]), $this->validImageExp)) {
                if(!DB::table('documents')->where('link',  Storage::url($files[$i]) )->where('documentable_type','App\News')->exists()) {
                    // return 'into if';
                    News::on('mysql2')->findOrFail($news->id)->getDocuments()->create(Document::prepareDocParams(Storage::url($files[$i])));
                }
            }            
        }
        $docsObject = News::findOrFail($news->id)->getDocuments()->get(); // don't change this position //
        return view('admin.news.show', [
            'news' => $news,
            'locale' => $locale,
            'fileurls' => $fileurls,
            'docsObject' => $docsObject,
            'comments' => $comments,
            'folder_name' => $this->folder_name,
        ]);
        // return 'Show News-'. $news_id . ' | lng: ' .$locale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $news = News::findOrFail($id);
        $lang_id = $news->lang_id;
        $authors = Author::where('lang_id', $lang_id)->get();
        $docsObject = $news->getDocuments()->get();

        $allTagsArray = Post::getTagsByLangId($lang_id);
        $newsTagsArray = $news->tagArray;
        $allTagsList = implode(',',$allTagsArray);
        $newsTagsList = $news->tagList;


        $images = Storage::files('public/'.$this->folder_name.'/'.$news->id);
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            if(in_array(Document::getTypeFromLink($images[$i]), $this->validImageExp)) {
                $imageurls[$i]['url'] = Storage::url($images[$i]);
                $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
            }            
        }
        
        return view('admin.news.edit',[
            'news' => $news,
            'authors' => $authors,
            'locale' => $locale,
            'allTagsList' => $allTagsList,
            'newsTagsList' => $newsTagsList,
            'docsObject' => $docsObject,
            'folder_name' => $this->folder_name,
            'imageurls' => $imageurls,
            'post_typ' => $this->post_typ,
            'atags' => $allTagsArray,
            'ntags' => $newsTagsArray,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $news_id, $locale)
    {
        $this->validate($request,[
            'title' => 'required|max:400',
            'short_text' => 'required|string',
            'html_code' => 'required|string',
            'img' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|alpha_dash|max:100',
            'meta_k' => 'nullable|max:500',
            'meta_d' => 'nullable|max:1000',
            // 'view' => 'required',
            'n_duration' => 'required|string',
            'post_typ' => 'required|integer',
            'author_id' => 'required|integer',
            'lang_id' => 'required|integer',
            'tags'=> 'required|array',
        ]);
        
        $news = News::on('mysql2')->findOrFail($news_id);
        $old_date = $news->date;

        $news->update($request->all());
        Event::checkAndSaveIfNotExists($request->input('date'), $request->input('lang_id'));
        Event::checkAndDeleteEventDate($old_date, $request->input('lang_id'));

        if($request->input('tags')) {
            if(!empty($request->input('tags'))) {
                $news->retag($request->input('tags'));

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

        // update lang_id into taggable_taggables
        DB::connection('mysql2')->table('taggable_taggables')
        ->where('taggable_type', 'App\\News')
        ->where('taggable_id', $news_id)
        ->update(['lang_id' => $request->input('lang_id') ]);

        return redirect()->route('admin.news.edit', [$news->id, $locale]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $news = News::on('mysql2')->find($id);
        $date = $news->date;
        $lang_id = $news->lang_id;

        $news->getDocuments()->delete(); // 100
        $news->getComments()->delete(); // 100
        $news->detag(); // 100
        $news->delete();

        Event::checkAndDeleteEventDate($date, $lang_id); // 100
        return redirect()->route('admin.news.index', $locale);
    }
}
