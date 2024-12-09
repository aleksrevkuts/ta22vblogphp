@extends('partials.layout')
@section('title', 'Comments')

@section('content')
<div class="container mx-auto">
    <a href="{{ route('comments.create') }}" class="btn btn-primary mb-4">Add Comment</a>

    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Body</th>
                <th>Post</th>
                <th>User</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>
                        <div class="join">
                            <a href="{{ route('comments.show', $comment) }}" class="btn join-item btn-info">View</a>
                            <a href="{{ route('comments.edit', $comment) }}" class="btn join-item btn-warning">Edit</a>
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn join-item btn-error">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $comments->links() }}
    </div>
</div>
@endsection
