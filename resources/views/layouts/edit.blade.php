@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-lg font-semibold">Edit Profile</h2>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.update', Auth::id()) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            <small class="text-gray-500">Leave blank to keep the current password.</small>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Update Profile</button>
            <a href="{{ route('dashboard') }}" class="mt-4 w-full bg-red-500 text-white py-2 rounded-md text-center hover:bg-red-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
