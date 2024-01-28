<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = auth()->id();
        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('posts.show', $postId);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('update', $comment);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('update', $comment);

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('delete', $comment);

        $postId = $comment->post_id;
        $comment->delete();

        return redirect()->route('posts.show', $postId);
    }
}
