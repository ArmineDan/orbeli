<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Category;
// use App\Tags;
use App;
use App\Lang;
use App\Author;
use App\File;
use App\Document;
use App\Event;
use Validator;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang_id = Post::getLangId();
        return view('admin.posts.index', [
            // 'posts' => Post::paginate(3)
            'posts' => Post::with('getCategory')->where('lang_id', $lang_id)->paginate(3),
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
                                WHERE   (TABLE_NAME = 'posts')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        // return $last_id;

        // $last_id = 777;
        $images = Storage::files('public/post/'.$last_id); // this are images //
        // return $files;
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
        
        // return $imageurls;
        
        $lang_id = Post::getLangId();        
        $authors = Author::where('lang_id', $lang_id)->get();
        $categories = Category::where('lang_id', $lang_id)->get();
        $allTagsColumn = DB::select("SELECT DISTINCT t1.name FROM taggable_tags AS t1 JOIN taggable_taggables AS t2 ON t1.tag_id = t2.tag_id WHERE lang_id=$lang_id");
        $allTags = [];
        for ($i=0; $i < count($allTagsColumn); $i++) { 
            $allTags[$i] = $allTagsColumn[$i]->name;
        }
        // return ($allTags);

        // $tags = Post::allTags();
        // return $tags;       
        return view('admin.posts.create', [
            'post' => [],
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $allTags,
            'locale' => App::getLocale(),
            'lang_id' => $lang_id,
            'imageurls' => $imageurls,
            'last_id' => $last_id,           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $validator = $this->validate( $request, [
            'title'=>'bail|required|max:400',
            'short_text'=>'required|string',
            'html_code'=>'required|string',
            
            'img'=>'required|string',
            'thumb_img' =>'nullable|string',
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

        $post = Post::create($request->all());
        $post_id = $post->id;
        if($request->input('tags')) {
            // $tagsString = $request->tags;
            $tagsArray = explode(',',$request->tags);
            $post->tag($tagsArray); // store-to-db
        }
        
        Event::checkAndSaveIfNotExists($request->input('date'));
            // $post_id = $request->input('post_id') - 1;
            // $post = Post::findOrFail($post_id);
        
        DB::table('taggable_taggables')
            ->where('taggable_type', 'App\\Post')
            ->where('taggable_id', $post_id)
            ->update(['lang_id' => $request->input('lang_id') ]);
        return redirect()->route('admin.post.show', [$post_id, App::getLocale()]);
    }


    /**
     * Display the specified resource.
     *Post $post
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post_id, $locale)
    { 
        $lang_id_column = DB::select('select id from langs where lng = ?', [$locale]);
        $lang_id = $lang_id_column[0]->id;
        $post = Post::with('getCategory')->where('lang_id', $lang_id)->where('id', $post_id)->get();

        $comments = Post::find($post_id)->getComments()->get();
        
        // return gettype($comments) ;

        $files = Storage::files('public/post/'.$post_id);
        // $type = Document::getTypeFromLink($files[2]);
        // return $type;
        $validImageExp = ['jpg','png','jpeg','pjpeg','bmp', 'gif', 'svg'];
        $fileurls = [];
        for ($i=0; $i < count($files) ; $i++) {
            $fileurls[$i]['url'] = Storage::url($files[$i]);
            $fileurls[$i]['size'] = $size = Storage::size($files[$i]);
            if(!in_array(Document::getTypeFromLink($files[$i]), $validImageExp)) {
                if(!DB::table('documents')->where('link',  Storage::url($files[$i]) )->where('documentable_type','App\Post')->exists()) {
                    // return 'into if';
                    Post::findOrFail($post_id)->getDocuments()->create(Document::prepareDocParams(Storage::url($files[$i])));
                }
            }
            
        }
        
        $docsObject = Post::findOrFail($post_id)->getDocuments()->get();
        // return $files;
        // return $post[0];
        return view('admin.posts.show', [
            'post' => $post[0],
            'locale' => $locale,
            'fileurls' => $fileurls,
            'docsObject' => $docsObject,
            'comments' => $comments,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $post = Post::findOrFail($id);
        // $has = App\Post::has('getDocuments')->get();
        // return $has;
        $lang_id = $post->lang_id;     
        $authors = Author::where('lang_id', $lang_id)->get();
        $categories = Category::where('lang_id', $lang_id)->get();
        $allTags = Post::allTags();
        // return gettype($allTags); 
        $postTags = $post->tagArray;        
        $postTagsList = $post->tagList;

        $tags1 = DB::select("SELECT DISTINCT t1.name FROM taggable_tags AS t1 JOIN taggable_taggables AS t2 ON t1.tag_id = t2.tag_id WHERE lang_id=3");
        // return $tags1;
              
        $allTagsList = implode(',',$allTags);

        

        $docsObject = $post->getDocuments()->get();
        // return $docsObject;
        

        // $tagList = $post->tagList;
        // return $tagArray;
        if($post) {

            return view('admin.posts.edit',[
                'post' => $post,
                'authors' => $authors,
                'categories' => $categories,
                'locale' => $locale,
                'allTagsList' => $allTagsList,
                'postTagsList' => $postTagsList,
                'docsObject' => $docsObject,
            ]);

        } else {
            return view('404error');
        }        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id, $locale)
    {

        $post = Post::findOrFail($post_id);
        $post->update($request->all());
        Event::checkAndSaveIfNotExists($request->input('date'));

        if($request->input('tags')) {
            if(!empty($request->input('tags'))) {
                $post->retag($request->input('tags'));
            }            
        }

        
        if($request->input('files')) {
            $fl_array =  $request->input('files');
            // $fl_rows =[]; // fot debugging
            foreach($fl_array as $key => $link) {                
                // $fl_rows[] = Document::prepareDocParams($link);
                Document::find($key)->update(Document::prepareDocParams($link));
            }
            // return $fl_rows;
        }

        if($request->input('new_files')) {
            $fl_string = $request->input('new_files');
            $fl_array = explode(',',$fl_string);
            // $fl_rows =[]; // fot debugging
            foreach($fl_array as $key => $link) {
                // $fl_rows[$key] = File::prepareFile($link);
                $post->getDocuments()->create(Document::prepareDocParams($link));
            }
            // return $fl_rows;
        }

        return redirect()->route('admin.post.edit', [$post_id, $locale]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $locale)
    {
        
        $post = Post::findOrFail($post_id);
        $post->getDocuments()->delete(); // 100
        $post->detag(); // 100
        $post-delete();
        return redirect()->route('admin.post.index', $locale);
    }
}
