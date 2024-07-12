@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <!-- Tambahkan informasi user lainnya di sini -->
                </div>
                <a href="{{ route('profile.edit', $users->id) }}" class="btn btn-sm btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
