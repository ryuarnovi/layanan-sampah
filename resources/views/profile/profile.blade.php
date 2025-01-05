@extends('layouts.app')

@section('title', 'Halaman Profil')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center">Profile</h1>

    <div class="mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold">Selamat datang, {{ Auth::user()->name }}!</h2>
        <p class="mt-2 text-gray-600">Email: {{ Auth::user()->email }}</p>

        <div class="mt-6">
            <h3 class="text-xl font-semibold">Opsi</h3>
            <ul class="mt-4 space-y-2">
                <li>
                    <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Edit Profil</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection