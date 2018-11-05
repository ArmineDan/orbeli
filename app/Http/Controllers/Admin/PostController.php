<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Category;
// use App\Tags;
use App;
use App\Lang;
use App\Author;
use App\File;
use App\Document;
use App\Event;


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
        $lang_id = Post::getLangId();        
        $authors = Author::where('lang_id', $lang_id)->get();
        $categories = Category::where('lang_id', $lang_id)->get();
 
        $tags = Post::allTags();        
        return view('admin.posts.create', [
            'post' => [],
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags,
            'locale' => App::getLocale(),
            'lang_id' => $lang_id,
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
        $this->validate( $request, [
            'title'=>'required|string|max:400',
            'short_text'=>'max:800',
            'html_code'=>'required|string',
            
            'img'=>'required|string',
            'thumb_img' =>'required|string',
            'date'=>'required|date',
            'status'=>'required|alpha_dash|max:100',
            'meta-k'=>'nullable|string|max:400',
            'meta-d'=>'nullable|string|max:600',
            // 'view' => 'required|integer',
            'post_typ'=>'required|integer',
            'author_id' => 'required|integer',
            'lang_id'=>'required|integer',
            'tags'=> 'required|string',
        ]);

        $post = Post::create($request->all());
        if($request->input('tags')) {
            // $tagsString = $request->tags;
            $tagsArray = explode(',',$request->tags);
            $post->tag($tagsArray); // store-to-db
        }
        if($request->input('files')) {
            $fl_string = $request->input('files');
            $fl_array = explode(',',$fl_string);
            // $fl_rows =[]; // fot debugging
            foreach($fl_array as $key => $link) {
                // $fl_rows[$key] = File::prepareFile($link);
                $post->getDocuments()->create(Document::prepareDocParams($link));
            }
            // return $fl_rows;
        }

        Post::addTagsToKeys($request->input('tags'), $request->input('meta_k'), $post->id);
        Event::checkAndSaveIfNotExists($request->input('date'));
        return redirect()->route('admin.post.index', App::getLocale());
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
        $lang_id = $post->lang_id;        
        $authors = Author::where('lang_id', $lang_id)->get();
        $categories = Category::where('lang_id', $lang_id)->get();
        $allTags = Post::allTags(); 
        $postTags = $post->tagArray;
        $postTagsList = $post->tagList;
        $allTagsList = implode(',',$allTags);
        

        // $tagList = $post->tagList;
        // return $tagArray;
        if($post) {
            return view('admin.posts.edit',compact('post','authors', 'categories', 'locale', 'allTagsList', 'postTagsList'));
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
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
