<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('tables.commentTable', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.commentCreateFrom');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {

        $comments = new Comment;

        $comments->content = $request->content;

        $comments->save();

        return $this->responseRedirectAdmin('comments.index', 'Comment Creado');
    }

    public function show($id)
    { 
         $comment = Comment::where('id', $id)->first();
        return view('forms.commentUpdateForm', compact('comment'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        Comment::where('id', $id)
          ->update([
            'content' => $request->content,
            
        ]);

        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deletedRows = Comment::where('id', $id)->delete();
        return redirect()->route('comments.index');
    }

}