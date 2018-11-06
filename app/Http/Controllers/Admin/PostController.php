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

use Illuminate\Database\Eloquent\Model;


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
            'title'=>'bail|required|max:400',
            'short_text'=>'max:1000',
            'html_code'=>'required|string',
            
            'img'=>'required|string',
            'thumb_img' =>'required|string',
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

        // Post::addTagsToKeys($request->input('tags'), $request->input('meta_k'), $post->id);
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
