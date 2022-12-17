<?php

namespace App\Http\Controllers;

use App\Models\Post;
use League\Fractal\Manager;
use Illuminate\Http\JsonResponse;
use App\Transformers\PostTransformer;
use App\Http\Requests\StorePostRequest;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class PostController extends Controller
{
    private $fractal;
    private $postTransformer;

    function __construct(Manager $fractal, PostTransformer $postTransformer)
    {
        $this->fractal = $fractal;
        $this->postTransformer = $postTransformer;

    }
    public function index(): ?array
    {
        $postsPaginator = Post::orderBy('created_at', 'desc')->paginate(10);

        $posts = new Collection($postsPaginator, new PostTransformer());
        $posts->setPaginator(new IlluminatePaginatorAdapter($postsPaginator));

        $posts = $this->fractal->createData($posts);

        return $posts->toArray();
    }

    public function store(StorePostRequest $request) : JsonResponse
    {
        $post = Post::create([
            'content' => $request->post_content,
            'region' => $request->region,
            'links' => $request->links,
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

    public function search($param): ?array
    {
        $results = Post::withAnyTags([$param]) //search by tags
           ->orWhere("links", "LIKE", "%{$param}%" ) //search by given links
           ->orWhereHas("category", function($q) use ($param) { //search by category name
               $q->where("name", "LIKE", "%{$param}%");
           })->paginate(10);

        $posts = new Collection($results, new PostTransformer());
        $posts->setPaginator(new IlluminatePaginatorAdapter($results));

        $posts = $this->fractal->createData($posts);

        return $posts->toArray();
    }
}
