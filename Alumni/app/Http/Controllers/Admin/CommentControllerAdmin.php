<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentControllerAdmin extends ControllerAdmin
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET all the Comment//
         $comments = Comment::latest()->paginate(20);
        return view('admin/comments', compact('comments'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST a new comment
        $comment = Comment::create($request->all());
        return view("admin/comment_show", compact('comment'))->with('success','Comment successfully added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return view("admin/comment_show", compact('comment'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {   
        return view('admin/comment_edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //UPDATE a comment
        $comment = Comment::find($id);
        $comment->update($request->all());
        return redirect("/admin/comments/{$comment->id}")->with('success','Comment successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE a comment
        Comment::destroy($id);
        return redirect("/admin/comments/")->with('success','Comment successfully deleted.');
    }
}