@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-4">

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
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div class="card-text text-muted">
                    <p>Posted at: {{ $post->created_at->format('M d, Y') }}</p>
                </div>
                @if (auth()->id() == $post->author_id)
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                @endif
            </div>
        </div>

        <div class="mb-4">
            <h3 class="mb-4">Comments</h3>
            @forelse ($post->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body position-relative">
                        @if (auth()->id() == $comment->user->id)
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-secondary position-absolute top-0 start-0 m-2" style="right: 0">Edit</a>
                        @endif
                        <p class="card-text" id="comment-body-{{ $comment->id }}">{{ $comment->body }}</p>
                        <p class="text-muted">Commented by {{ $comment->user->name }}
                            on {{ $comment->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            @empty
                <p>No comments yet.</p>
            @endforelse

        </div>

        @auth
            <form action="{{ route('comments.store', ['postId' => $post->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment" class="form-label">Add Comment</label>
                    <textarea id="comment" name="body" rows="3" class="form-control"
                              placeholder="Write your comment..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
            </form>
        @else
            <p><a href="{{ route('login') }}" class="text-primary">Log in</a> to post comments.</p>
        @endauth
    </div>
@endsection
