@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Users</h1>
        <a href="{{ route('usersss.create') }}" class="btn btn-primary mb-3">Add User</a>
        @if(session('success'))
            <div class="alert alert-success mb-3 mt-3">{{ session('success') }}</div>
        @endif
        <table class="table ">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('usersss.show', $user) }}" class="btn btn-info">View</a>
                        <a href="{{ route('usersss.edit', $user) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('usersss.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection
