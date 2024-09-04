@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">

            @if ($user->profile_picture)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle profile-img">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<style>
.profile-img {
    width: 150px; /* Adjust width as needed */
    height: 150px; /* Adjust height as needed */
    object-fit: cover; /* Ensures the image covers the circle */
}
</style>
@endsection
