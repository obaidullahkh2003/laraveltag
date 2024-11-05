@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Permissions</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create New Permission</a>

        <table class="table mt-4 ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('permissions.show', $permission) }}" class="btn btn-info">View</a>
                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{-- Pagination Links --}}
        <div class="mt-3 d-flex justify-content-center">
            {{ $permissions->links() }}
        </div>
    </div>
@endsection
