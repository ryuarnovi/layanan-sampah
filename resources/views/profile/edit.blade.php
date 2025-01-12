{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<x-logout-modal />

<div class="profile-container">
    <div class="profile-wrapper">
        <img src="{{ asset('images/background/profile-background.png') }}" 
             class="background-image" 
             alt="Profile background image">
             
        <div class="content-wrapper">
            <div class="profile-sidebar">
                <img src="{{ Auth::user()->avatar 
                    ? asset('storage/' . Auth::user()->avatar) 
                    : asset('images/default-avatar.jpg') }}" 
                     class="profile-avatar" 
                     alt="Profile photo of {{ Auth::user()->name }}">
                
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-location">{{ Auth::user()->location ?? 'Location not set' }}</div>
                
                <a href="{{ route('profile.edit') }}" class="action-button">Update Profile</a>
                <a href="{{ route('profile.setting') }}" class="action-button">Settings</a>
                <button type="button" class="action-button" onclick="showLogoutModal()">Logout</button>
            </div>

            <div class="form-container">
                <x-alert />

                <form action="{{ route('profile.update') }}" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      class="profile-form">
                    @csrf
                    @method('PUT')
                    
                    <h1 class="form-title">UPDATE PROFILE</h1>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-input @error('email') is-invalid @enderror" 
                               value="{{ Auth::user()->email }}" 
                               {{ Auth::user()->google_id ? 'readonly' : '' }}>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="form-input @error('name') is-invalid @enderror" 
                               value="{{ Auth::user()->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" 
                               id="location" 
                               name="location" 
                               class="form-input @error('location') is-invalid @enderror" 
                               value="{{ Auth::user()->location }}">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="avatar" class="form-label">Profile Photo:</label>
                        <input type="file" 
                               id="avatar" 
                               name="avatar" 
                               class="form-input @error('avatar') is-invalid @enderror" 
                               accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="submit-button">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection