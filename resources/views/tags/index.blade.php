@extends('partials.layout')
@section('title', 'Tags')
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary" href="{{ route('tags.create') }}">Add Tag</a>

        <div class="text-center my-2">
            {{ $tags->links() }}
        </div>

        <table class="table table-zebra">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr class="hover">
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->created_at->format('M d, Y') }}</td>
                        <td>{{ $tag->updated_at->format('M d, Y') }}</td>
                        <td>
                            <div class="join">
                                <a href="{{ route('tags.show', ['tag' => $tag]) }}" class="btn join-item btn-info">View</a>
                                <a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="btn join-item btn-warning">Edit</a>
                                <button form="tag-delete-{{ $tag->id }}" class="btn join-item btn-error">Delete</button>
                            </div>
                            <form id="tag-delete-{{ $tag->id }}" action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tfoot>
        </table>
    </div>
@endsection
