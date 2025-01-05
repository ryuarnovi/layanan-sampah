@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center">Edit Profil</h1>

    <div class="mt-8 p-6 bg-white rounded-lg shadow-md">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT') <!-- Jika Anda menggunakan metode PUT untuk update -->
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white rounded-md px-4 py-2">Update Profil</button>
        </form>
    </div>
</div>
@endsection