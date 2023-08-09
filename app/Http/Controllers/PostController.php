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
        $data = Post::findOrFail($id);
        return new PostDetailResource($data);
    }

    public function store(Request $request)
    {
        $data  = $request->all();
        Post::create($data);
        return response()->json(['message' => 'Berhasil Tambah Data']);
    }


    public function update($id, Request $request)
    {
    }
}
