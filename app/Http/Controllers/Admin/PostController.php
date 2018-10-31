<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Tags;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index', [
            // 'posts' => Post::paginate(3)
            'posts' => Post::with('getCategory')->paginate(3),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = DB::select('select * from authors');
        $categories = Category::all();
        // $tags = Tags::groupBy('name')->get();
        $tags = Tags::query()->distinct()->get();
        return view('admin.posts.create', [
            'post' => [],
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags,
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
        $this->validate( $request, [
            'title'=>'required|string|max:400',
            'short_text'=>'max:800',
            'long_text'=>'required|string',
            'date'=>'required|date',
            'post_typ'=>'required|integer',
            'tags'=> 'required|string',
        //     'tag1'=>'nullable|string|max:255',
        //     'tag2'=>'nullable|string|max:255',
        //     'tag3'=>'nullable|string|max:255',
        //     'tag4'=>'nullable|string|max:255',
        //     'tag5'=>'nullable|string|max:255',
            'status'=>'required|alpha|max:100',
            'meta-k'=>'nullable|string|max:400',
            'meta-d'=>'nullable|string|max:600',
            'authors_id' => 'required|integer',
        ]);

        $tagsString = $request->tags;
        $tagsArray = explode(',',$request->tags);
        // var_dump($tagsArray);
        // var_dump($tagsLink);
        $post = Post::create($request->all());
        $post->tag($tagsArray);

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
    public function edit(Post $post)
    {
        //
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
