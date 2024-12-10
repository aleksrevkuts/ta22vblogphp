@extends('partials.layout')
@section('title', 'Comment #'.$comment->id)
@section('content')
    <div class="container mx-auto my-8">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-4">Back</a>
        <div class="card bg-base-300 shadow-xl">
            <div class="card-body">
                <h5 class="card-title text-2xl font-bold">Comment #{{ $comment->id }}</h5>
                <table class="table table-zebra w-full">
                    <tbody>
                        <tr class="hover">
                            <th>Body</th>
                            <td>{{ $comment->body }}</td>
                        </tr>
                        <tr class="hover">
                            <th>User</th>
                            <td>{{ $comment->user->name }}</td>
                        </tr>
                        <tr class="hover">
                            <th>Post</th>
                            <td>{{ $comment->post->title }}</td>
                        </tr>
                        <tr class="hover">
                            <th>Created At</th>
                            <td>{{ $comment->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                        <tr class="hover">
                            <th>Updated At</th>
                            <td>{{ $comment->updated_at->format('M d, Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('comments.index') }}" class="btn btn-secondary mt-4">Back to List</a>
            </div>
        </div>
    </div>
@endsection
