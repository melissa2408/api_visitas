<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['index', 'show']);
    }

    public function index() {

        return Post::all()->load('category', 'user');
    }

    public function store(Request $request) {

        $user = auth()->user();

        $post = new Post([
            'title' => $request->title,
            'description' => $request->description,
            'url_image' => $request->url_image,
            'user_id' => $user->id,
            'category_id' => $request->category_id
        ]);

        $post->save();

        return response()->json($post, 201);
    }

    public function show(Post $post) {
        
        return $post;
    }

    public function update(Request $request, Post $post) {

        $user = auth()->user();

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'url_image' => $request->url_image,
            'user_id' => $user->id,
            'category_id' => $request->category_id
        ]);

        return response()->json($post);
    }

    public function destroy(Post $post) {

        $post->delete();

        return response()->json(null, 204);
    }
}
