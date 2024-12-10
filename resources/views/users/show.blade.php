@extends('partials.layout')
@section('title', 'User Details')
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary mb-4" href="{{ url()->previous() }}">Back</a>
        <table class="table table-zebra w-full">
            <tbody>
                <tr class="hover">
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr class="hover">
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr class="hover">
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr class="hover">
                    <th>Created At</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr class="hover">
                    <th>Updated At</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
