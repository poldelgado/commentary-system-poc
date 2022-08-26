<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StoreReplyCommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CommentResource::collection(Comment::where('depth',0)
        ->with('replies')
        ->orderBy('created_at','DESC')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, $parent_id=null)
    {
        $comment = Comment::create([
            'username' => $request->username,
            'comment' => $request->comment,
            //'parent_id',
        ]);

        return response()->json([
            'comment' => CommentResource::make($comment),
            'message' => 'Comment saved',
        ], 201);
    }

    public function reply(StoreReplyCommentRequest $request)
    {
        $reply = Comment::create([
            'username' => $request->username,
            'comment' => $request->comment,
            'parent_id' => $request->parent_id,
            'depth' => $request->depth,
        ]);

        return response()->json([
            'reply' => CommentResource::make($reply),
            'message' => 'Reply saved',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
