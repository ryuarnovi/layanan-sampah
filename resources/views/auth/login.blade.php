@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

<div class="login-container">
  <div class="registration-container">
    <img
      class="background-image"
      src="https://cdn.builder.io/api/v1/image/assets/TEMP/60741ac0f7546bd34775b44d4ffc68c18732667ad483c89bf52155e161269e46?placeholderIfAbsent=true&apiKey=ec0a6845eef9472eafac242bdec5cdb9"
      alt=""
      loading="lazy"
    />
    <div class="content-wrapper">
      <div class="header-section">
        <h1 class="main-title">Selamat Datang Kembali</h1>
        <p class="subtitle">
          Silakan masuk untuk melanjutkan ke akun Anda.
        </p>
      </div>

      <!-- Tambahkan Alert Error -->
      @if(session('error'))
      <div class="alert-error">
          {{ session('message') }}
      </div>
      @endif

      <form class="form-section" method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="form-title">LOGIN</h2>
        <div class="input-group">
          <label for="email" class="input-label">Email</label>
          <input type="email" id="email" name="email" class="input-field" required aria-required="true" />
          
          <label for="password" class="input-label">Kata Sandi</label>
          <input type="password" id="password" name="password" class="input-field" required aria-required="true" />
        </div>
        <p class="form-note">
          Jika Anda belum memiliki akun, silakan <a href="{{ route('register') }}"  class="bg-green-700 text-white px-6 py-2 rounded-lg hover:bg-green-800 transition-colors duration-200">Daftar</a>.
        </p>
        <button type="submit" class="submit-button">MASUK</button>
        
        <div class="divider">
          <span>Atau</span>
        </div>
        
        <a href="{{ route('google.login') }}" class="google-login-button">
          <img src="{{ asset('images/icon/google.png') }}" alt="Google Icon" class="google-icon">
          Masuk dengan Google
        </a>
      </form>
    </div>
  </div>
</div>
@endsection