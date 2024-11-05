@extends('layouts.admin')

@section('main-content')
    <h1>Block Details</h1>
    <p><strong>Block ID:</strong> {{ $block->block_id }}</p>
    <p><strong>Region ID:</strong> {{ $block->region_id }}</p>
    <p><strong>Title:</strong> {{ $block->title }}</p>
    <p><strong>Content:</strong> {{ $block->content }}</p>
    <p><strong>Is Active:</strong> {{ $block->is_active ? 'Yes' : 'No' }}</p>
    <div class="mt-3 mb-3">
        <img src="{{ asset('storage/' . $block->img) }}" alt="User Image" class="img-fluid">
    </div>
    <a href="{{ route('blocks.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('blocks.edit', $block) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('blocks.destroy', $block) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
