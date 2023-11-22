<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('marketplace.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marketplace.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Post::create($request->validated() + ['user_id' => auth()->id(), 'image' => $request->file('image')->store('posts', 'public'),]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user');

        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->load('user');

        return view('marketplace.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            unlink(storage_path('app/public/' . $post->image));
        }

        $post->update($request->validated() + ['user_id'=> auth()->id(),'image'=> $request->file('image')->store('posts', 'public')]);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
