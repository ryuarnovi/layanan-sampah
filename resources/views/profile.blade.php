@extends('layouts.app')

@section('title', 'Halaman Profil')



@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

<div class="profile-container">
    <div class="profile-wrapper">
        <img src="{{ asset('images/background/profile-background.png') }}" class="background-image" alt="Background" />
        <div class="content-wrapper">
            <div class="profile-sidebar">
                @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="profile-avatar" alt="Profile photo of {{ Auth::user()->name }}" />
            @else
                <img src="{{ asset('images/default-avatar.jpg') }}" class="profile-avatar" alt="Profile photo of {{ Auth::user()->name }}" />
            @endif
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-location">{{ Auth::user()->location ?? 'Location not set' }}</div>
                <a href="{{ route('profile.edit') }}" class="action-button">Update Profile</a>
                <a href="{{ route('profile.setting') }}" class="action-button">Setting</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="action-button">Logout</button>
                </form>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="form-container">
                @csrf
                @method('PUT')
                
                <h1 class="form-title">PROFILE</h1>
                
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" 
                    value="{{ Auth::user()->email }}" {{ Auth::user()->google_id ? 'readonly' : '' }} />
                
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-input" 
                    value="{{ Auth::user()->name }}" />
                
                <label for="location" class="form-label">Asal</label>
                <input type="text" id="location" name="location" class="form-input" 
                    value="{{ Auth::user()->location }}" />
                
                <button type="submit" class="submit-button">EDIT</button>
            </form>
        </div>
    </div>
</div>
@endsection