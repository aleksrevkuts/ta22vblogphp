@extends('partials.layout')
@section('title', 'Add Comment')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-4">Add Comment</h1>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Comment</span>
                        </div>
                        <textarea
                            name="body"
                            id="body"
                            rows="4"
                            placeholder="Write your comment..."
                            class="textarea textarea-bordered @error('body') textarea-error @enderror w-full"
                            required>{{ old('body') }}</textarea>
                        <div class="label">
                            @error('body')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Post</span>
                        </div>
                        <select
                            name="post_id"
                            id="post_id"
                            class="select select-bordered @error('post_id') select-error @enderror w-full"
                            required>
                            <option disabled selected>Select a post</option>
                            @foreach ($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                        <div class="label">
                            @error('post_id')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <button type="submit" class="btn btn-primary w-full">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
