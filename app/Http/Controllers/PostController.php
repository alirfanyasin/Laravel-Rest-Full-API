<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return PostResource::collection($data);
    }

    public function show($id)
    {
        $data = Post::with('writer:id,name')->findOrFail($id);
        return new PostDetailResource($data);
    }

    // Test to eager loading
    public function show2($id)
    {
        $data = Post::findOrFail($id);
        return new PostDetailResource($data);
    }
}
