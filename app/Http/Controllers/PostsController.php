<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        return view('create');
    }

    public function store(CreatePostRequest $request)
    {
        $imagePath = $request->image->store('images');

        $post = Post::create(['content' => $request->content, 'image' => $imagePath]);

        return redirect("/share/{$post->id}");
    }

    public function show(Post $post)
    {
        return view('share', [
            'content' => $post->content,
            'imageUrl' => Storage::url($post->image),
            'shareUrl' => url("/share/{$post->id}"),
        ]);
    }
}
