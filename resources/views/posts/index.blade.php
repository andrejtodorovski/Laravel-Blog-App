@php use Illuminate\Support\Str; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-4">
        <h1 class="font-weight-bold mb-4">All Posts</h1>
        @auth
            <a href="{{ route('posts.create') }}"
               class="btn btn-primary mb-3">Create New Post</a>
        @else
            <p><a href="{{ route('login') }}" class="text-primary">Log in</a> to post blog posts.</p>
        @endauth

        <div class="card-group row">
            @foreach ($posts as $post)
                <div class="col-4">
                    <div class="card m-3 card-border-radius bg-light">
                        <img
                            class="card-img-top"
                            src="https://www.blogtyrant.com/wp-content/uploads/2017/02/how-to-write-a-good-blog-post.png"
                            alt="Recipe image"
                        />
                        <div class="card-body">
                            <a
                                class="card-title custom-card-title recipeName "
                                href="{{ route('posts.show', $post->id) }}"
                            >{{ $post->title }}</a>
                            <p class="card-text">
                                {{ Str::limit($post->body, 100) }}
                            </p>
                            <div class="card-text d-flex justify-content-between">
                                <p>Slug: {{ $post->slug }}</p>
                                <p>{{ $post->active == 0 ? 'Inactive' : 'Active' }}</p>
                            </div>
                            <div class="card-text text-muted">
                                <p>Posted at: {{ $post->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link">Read More</a>
                            @if (auth()->id() == $post->author_id)
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
