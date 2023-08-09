<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/post', function () {
    return Post::all();
    return response()->json(['message' => 'Berhasil Get Data']);
});



Route::get('/post/{id}', function ($id) {
    return Post::find($id);
    return response()->json(['message' => 'Berhasil Detail Data']);
});



Route::post('/post/store', function (Request $request) {
    $data = [
        'title' => $request->title,
        'news_content' => $request->news_content,
        'author' => $request->author,
    ];

    Post::create($data);
    return response()->json(['message' => 'Berhasil Tambah Data']);
});



Route::patch('/post/update/{id}', function ($id, Request $request) {
    $post = Post::find($id);

    if (!$post) {
        return response()->json(['message' => 'Post not found'], 404);
    }

    $data = [
        'title' => $request->input('title'),
        'news_content' => $request->input('news_content'),
        'author' => $request->input('author'),
    ];

    if ($post->update($data)) {
        return response()->json(['message' => 'Berhasil Update Data']);
    } else {
        return response()->json(['message' => 'Gagal Update Data'], 500);
    }
});
