@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Carousels</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('carousels.create') }}" class="btn btn-primary">Create New Carousel</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Image</th>
                <th>Subheading</th>
                <th>Heading</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($carousels as $carousel)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $carousel->image_url) }}" alt="Carousel Image" width="50">
                    </td>
                    <td>{{ $carousel->subheading }}</td>
                    <td>{{ $carousel->heading }}</td>
                    <td>
                        <a href="{{ route('carousels.edit', $carousel) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('carousels.destroy', $carousel) }}" method="POST" style="display:inline;">
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
            {{ $carousels->links() }}
        </div>
    </div>
@endsection
