@extends('partials.layout')
@section('title', 'Create Tag')
@section('content')
    <div class="container mx-auto">
        <h2>Create a New Tag</h2>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Post</button>
        </form>

    </div>
@endsection
