<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Requests\PostUpdateRequest;
use App\Notifications\YourPostGotNewLike;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $this->authorize('view-any', Post::class);
       $user = Auth::user();
        $search = $request->get('search', '');

        $posts = Post::search($search)
            ->latest()
            ->paginate();
        $user->attachLikeStatus($posts);
        return new PostCollection($posts);
    }

    /**
     * @param \App\Http\Requests\PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);

        $validator =  Validator::make($request->all(), [
            'body' => ['required','max:255', 'string'],
            'screen' => ['required','file'],
            'user_id' => ['numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        }else{
            $data = $validator->valid();
        }

        $post = Post::create($data);

        if (request()->has(['screen'])) {
            $post->addMediaFromRequest('screen')->toMediaCollection('post_screens');
        }

        return new PostResource($post);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        $this->authorize('view', $post);

        return new PostResource($post);
    }

    /**
     * @param \App\Http\Requests\PostUpdateRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
       // $this->authorize('update', $post);

      //  $validated = $request->validated();

        $post->update($validated);

        return new PostResource($post);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->noContent();
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, Post $post)
    {
        $user = Auth::user();
        $post->user->alret("You Got new Like");
        $post->user->notify(new YourPostGotNewLike());
        return $user->like($post);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function unlike(Request $request, Post $post)
    {
        $user = Auth::user();
        $user->unlike($post);
        return response()->noContent();
    }
}
