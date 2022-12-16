<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Transformers\PostTransformer;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StorePostRequest;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;

class PostController extends Controller
{
    private $fractal;
    private $postTransformer;

    function __construct(Manager $fractal, PostTransformer $postTransformer)
    {
        $this->fractal = $fractal;
        $this->postTransformer = $postTransformer;

    }
    public function index()
    {
        $postsPaginator = Post::paginate(10);

        $posts = new Collection($postsPaginator, new PostTransformer());
        $posts->setPaginator(new IlluminatePaginatorAdapter($postsPaginator));

        $posts = $this->fractal->createData($posts);

        return $posts->toArray();
    }

    public function store(StorePostRequest $request) : JsonResponse
    {
        $post = Post::create([
            'content' => $request->content,
            'region' => $request->region,
            'links' => $request->links,
            'category_id' => $request->category_id
        ]);

        if($request->has('tags')) $post->attachTags($request->tags);

        return response()->json(['Post created', $this->postTransformer->transform($post)],200);
    }

    public function update(StorePostRequest $request, Post $post) : JsonResponse {
        $post->update([
            'content' => $request->content,
            'region' => $request->region,
            'links' => $request->links,
            'category_id' => $request->category_id
        ]);

        if($request->has('tags')) $post->syncTags($request->tags);

        return response()->json(['Post updated', $this->postTransformer->transform($post)],200);
    }

    public function destroy(Post $post) : JsonResponse
    {
        $post->delete();
        return response()->json(['Post deleted'],200);
    }
}
