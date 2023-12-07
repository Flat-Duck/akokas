<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);

        $validator =  Validator::make(
            $request->all(),
            [
            'text' => ['required','max:255', 'string'],
            'post_id' =>['required','exists:posts,id'],
            'user_id' => ['numeric'],
            ]
        );

        $post = Post::findOrfail($request->post_id);

        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        } else {
            $data = $validator->valid();
        }

        $comment = $post->comment($request->text);

        $post->load('comments');
        // if (request()->has(['screen'])) {
        //     $post->addMediaFromRequest('screen')->toMediaCollection('post_screens');
        // }

        return new PostResource($post);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function reply(Comment $comment, Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);

        $validator =  Validator::make(
            $request->all(),
            [
            'text' => ['required','max:255', 'string'],
            'user_id' => ['numeric'],
            ]
        );

       // $post = Post::findOrfail($request->post_id);

        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        } else {
            $data = $validator->valid();
        }

        $comment->comment($request->text);

        $comment->load('comments');
        // if (request()->has(['screen'])) {
        //     $post->addMediaFromRequest('screen')->toMediaCollection('post_screens');
        // }

        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->merge(['user_id' => auth()->user()->id]);

        $validator =  Validator::make($request->all(), [
            'text' => ['required','max:255', 'string'],
            'user_id' => ['numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        } else {
            $data = $validator->valid();
        }

        $comment->update([
            'original_text' => $request->text,
        ]);
        $comment->load('comments');
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->noContent();
    }
}
