@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Portfolio Items</h1>
        <a href="{{ route('portfolio.create') }}" class="btn btn-primary mt-3 mb-3">Add New Item</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Image</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($portfolioItem as $portfolioItems)
                <tr>
                    <td>{{ $portfolioItems->title }}</td>
                    <td>{{ $portfolioItems->subtitle }}</td>
                    <td><img src="{{ asset('storage/' . $portfolioItems->image_path) }}" alt="Image" width="100"></td>
                    <td>{{ $portfolioItems->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('portfolio.show', $portfolioItems) }}" class="btn btn-info">View</a>
                        <a href="{{ route('portfolio.edit', $portfolioItems) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('portfolio.destroy', $portfolioItems) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-center">
        {{ $portfolioItem->links() }}
        </div>
    </div>
@endsection
