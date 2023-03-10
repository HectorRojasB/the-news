<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Helpers\PostsHelper;
use Illuminate\Http\JsonResponse;
use App\Transformers\PostTransformer;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    private $helper;
    private $postTransformer;

    function __construct(PostsHelper $helper, PostTransformer $postTransformer)
    {
        $this->helper = $helper;
        $this->postTransformer = $postTransformer;

    }
    public function index(): ?array
    {
        $postsPaginator = Post::orderBy('created_at', 'desc')->paginate(10);
        return $this->helper->paginator($postsPaginator)->toArray();
    }

    public function store(StorePostRequest $request) : JsonResponse
    {
        $post = Post::create([
            'content' => $request->post_content,
            'region' => $request->region,
            'link' => $request->link,
            'category_id' => $request->category_id
        ]);

        if($request->has('tags')) $post->attachTags($request->tags);

        return response()->json(['Post created', $this->postTransformer->transform($post)],200);
    }

    public function update(StorePostRequest $request, Post $post) : JsonResponse
    {
        $post->update([
            'content' => $request->post_content,
            'region' => $request->region,
            'link' => $request->link,
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

    public function search($param): ?array
    {
        $results = (new Post())->search($param);
        return $this->helper->paginator($results)->toArray();
    }
}
