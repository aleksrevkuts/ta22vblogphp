@extends('partials.layout')
@section('title', 'Edit Tag')
@section('content')
    <div class="container mx-auto">
        <h2>Edit Tag</h2>

        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-control mb-4">
                <label for="name" class="label-text">Tag Name</label>
                <input type="text" name="name" id="name" class="input input-bordered w-full" value="{{ old('name', $tag->name) }}" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update Tag</button>
        </form>
    </div>
@endsection
