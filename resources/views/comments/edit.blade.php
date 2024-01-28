@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="mb-3 mt-3">Edit comment</h1>
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>
                    <textarea name="body" class="form-control">{{ $comment->body }}</textarea>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>

        </form>
    </div>
@endsection
