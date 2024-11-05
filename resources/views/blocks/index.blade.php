@extends('layouts.admin')

@section('main-content')
    <h1>Blocks</h1>
    <a href="{{ route('blocks.create') }}" class="btn btn-primary mt-3 mb-3">Create New Block</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Block ID</th>
            <th>Region ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($blocks as $block)
            <tr>
                <td>{{ $block->block_id }}</td>
                <td>{{ $block->region_id }}</td>
                <td>{{ $block->title }}</td>
                <td>{{ $block->content }}</td>
                <td>{{ $block->is_active ? 'Yes' : 'No' }}</td>
                <td>

                    <a href="{{ route('blocks.show', $block->block_id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('blocks.edit', $block->block_id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('blocks.destroy', $block->block_id) }}" method="POST" style="display:inline;">
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
        {{ $blocks->links() }}
    </div>
@endsection
