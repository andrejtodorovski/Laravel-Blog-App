@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-3 mt-3">Add a new blog post</h1>
        @auth
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" value="{{ $post->title ?? '' }}"
                           class="form-control" placeholder="Enter title" required>
                </div>

                <div class="form-group">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ $post->slug ?? '' }}"
                           class="form-control" placeholder="Enter slug">
                </div>

                <div class="form-group">
                    <label for="body" class="form-label">Body</label>
                    <textarea id="body" name="body" rows="4"
                              class="form-control" placeholder="Write something..."
                              required>{{ $post->body ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="active" class="form-label">Active</label>
                    <select id="active" name="active" class="form-control">
                        <option value="1" {{ (isset($post) && $post->active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ (isset($post) && !$post->active) ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Create
                </button>
            </form>
        @else
            <p><a href="{{ route('login') }}" class="text-primary">Log in</a> to post blog posts.</p>
        @endauth
    </div>
@endsection
