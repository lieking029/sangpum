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
        // Retrieve all posts with user details using eager loading
        $posts = Post::with('user')->get();

        // Pass the posts to the view
        return view('marketplace.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user(); // This retrieves the authenticated user model.

        // To concatenate strings in PHP, you should use the '.' operator instead of '+'
        $userName = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name; // This gets the user's full name.
        $userNickname = $user->nickname; // This gets the user's nickname.

        // You can now pass the user information to your view or use it to perform other actions.
        return view('marketplace.post.create', compact('user', 'userName', 'userNickname'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Create a new post with the validated request data, adding the user_id to the data array
        $post = Post::create($request->validated() + ['user_id' => auth()->id()]);

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Store the image in the 'posts' directory within the 'public' disk and get the path
            $path = $request->file('image')->store('posts', 'public');

            // Update the post with the path of the image
            $post->update(['image' => $path]);
        }

        // Redirect to the posts index route
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

        $post->update($request->validated() + ['user_id' => auth()->id(), 'image' => $request->file('image')->store('posts', 'public')]);

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
