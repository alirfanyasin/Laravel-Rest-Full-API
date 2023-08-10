<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return PostResource::collection($post->all());
    }

    public function show($id)
    {
        $data = Post::with('writer:id,name')->findOrFail($id);
        return new PostDetailResource($data);
    }

    // Test to eager loading
    public function show2($id, Post $post)
    {
        // $data = Post::findOrFail($id);
        return new PostDetailResource($post->findOrFail($id));
    }
}
