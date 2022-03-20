<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request; //? test case

        $newComment = $request->validate([
            'content' => 'required',
            'post_id' => 'required'
        ]);

        $comment = new Comment();
        $comment->content = $newComment['content'];
        $comment->post_id = $newComment['post_id'];
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id; //? test case

        $comment = Comment::find($id);
        $comment->replies()->delete();
        $comment->delete();

        return redirect()->back();
    }
}
