<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return response()->json(['message' => 'Berhasil Get Data', 'data' => $data]);
    }


    public function show($id)
    {
        $data = Post::find($id);
        return response()->json(['message' => 'Berhasil Detail Data', 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data  = $request->all();
        // $data = [
        //     'title' => $request->title,
        //     'news_content' => $request->news_content,
        //     'author' => $request->author,
        // ];

        Post::create($data);
        return response()->json(['message' => 'Berhasil Tambah Data']);
    }


    public function update($id, Request $request)
    {
    }
}
