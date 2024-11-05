@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>User Details</h1>
        <p><strong>Name:</strong> {{ $usersss->name }}</p>
        <p><strong>Email:</strong> {{ $usersss->email }}</p>
        <p><strong>Address:</strong> {{ $usersss->address }}</p>
        <p><strong>Phone:</strong> {{ $usersss->phone }}</p>
        <div>
            <img src="{{ asset('storage/' . $usersss->image) }}" alt="User Image" class="img-fluid">
        </div>
       <div class="mt-4">
           <a href="{{ route('usersss.edit', $usersss) }}" class="btn btn-warning">Edit</a>
           <a href="{{ route('usersss.index') }}" class="btn btn-secondary">Back to Users</a>
       </div>
    </div>
@endsection
