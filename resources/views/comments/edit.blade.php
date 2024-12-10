@extends('partials.layout')
@section('title', 'Edit Comment #'.$comment->id)
@section('content')
    <div class="container mx-auto my-8">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-4">Back</a>
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <form action="{{ route('comments.update', ['comment' => $comment]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Content</span>
                        </div>
                        <textarea name="content" id="content" rows="6" class="textarea textarea-bordered @error('content') textarea-error @enderror w-full" required placeholder="Update your comment...">{{ old('content') ?? $comment->content }}</textarea>
                        <div class="label">
                            @error('content')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <button type="submit" class="btn btn-primary mt-4">Update Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
