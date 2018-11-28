<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Lang;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale =  App::getLocale();
        $lang_id = Lang::getLangId();
        $comments = Comment::with('commentable')->where('lang_id', '=', $lang_id)->where('approved', '=', 0)->paginate(10);
        // return $comments; //->commentable->title;
        return view('admin.comments.index',[
            'comments' => $comments,
            'locale' => $locale,
        ]);
    }

    public function savecommentstatus(Request $request, $locale) {
        $reqAll = $request->all();
        // return $reqAll;
        $comment = $reqAll['comment'];
        // return $comment;
        $updateComm = [];
        foreach($comment as $key => $value) {
            $updateComm[] = ['id' => $key, 'approved' => $value, 'body' => $reqAll['body']];            
            Comment::find($key)->update(['body' => $reqAll['body'],'approved' => $value]);
        }

        // return $updateComm;
        $commentID = $updateComm[0]['id'];
        return redirect()->back()->with(['CommStatusMessage' => "Status of comment №$commentID was successfully changed."]);                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
