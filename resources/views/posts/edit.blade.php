@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mt-3 mb-3">Edit post</h1>
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title ?? '' }}"
                       class="form-control" placeholder="Enter title" required>
            </div>

            <!-- Slug Field -->
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ $post->slug ?? '' }}"
                       class="form-control" placeholder="Enter slug">
            </div>

            <!-- Body Field -->
            <div class="form-group">
                <label for="body" class="form-label">Body</label>
                <textarea id="body" name="body" rows="4"
                          class="form-control" placeholder="Write something..." required>{{ $post->body ?? '' }}</textarea>
            </div>

            <!-- Active Field -->
            <div class="form-group">
                <label for="active" class="form-label">Active</label>
                <select id="active" name="active" class="form-control">
                    <option value="1" {{ (isset($post) && $post->active) ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ (isset($post) && !$post->active) ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
@endsection
