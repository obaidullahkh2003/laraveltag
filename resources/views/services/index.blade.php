@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Services</h1>
        <a href="{{ route('services.create') }}" class="btn btn-primary mt-3 mb-3">Create New Service</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td><img src="{{ asset('storage/'.$service->icon) }}" alt="Current Icon" style="width: 50px;"></td>
                    <td>{{ $service->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
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
            {{ $services->links() }}
        </div>
    </div>
@endsection
