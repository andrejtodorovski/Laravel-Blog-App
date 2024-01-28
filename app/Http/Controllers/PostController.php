<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|max:255',
            'active' => 'required|boolean',
        ]);
        $validatedData['author_id'] = auth()->id();
        $post = Post::create($validatedData);
        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);


        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|max:255',
            'active' => 'required|boolean',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
