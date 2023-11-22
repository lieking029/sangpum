<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();

        // Handle the image upload if there's an image in the request
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('comments', 'public');
        }

        // Create the comment with the additional data
        $comment = Comments::create($data);

        // Redirect to the post view with a success message
        return redirect()
            ->route('comment', $data['post_id'])
            ->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $post = Post::with(['user', 'comments.user'])->findOrFail($id);
        $user = auth()->user(); // This retrieves the authenticated user model.

        // To concatenate strings in PHP, you should use the '.' operator instead of '+'
        $userName = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name; // This gets the user's full name.
        $userNickname = $user->nickname;
        $userId = $user->id;

        return view('marketplace.post.comment', compact('post', 'userName', 'userNickname', 'userId'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
