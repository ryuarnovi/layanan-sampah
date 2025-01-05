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
    <div class="container">
        <div class="content-wrapper">
          <div class="header-section">
            <h1 class="main-title">Selamat Datang di Aplikasi Kami</h1>
            <p class="subtitle">Daftar untuk memulai perjalanan Anda</p>
          </div>
          <div class="form-section">
            <h2 class="form-title">Formulir Pendaftaran</h2>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="input-group">
                <label class="input-label" for="name">Nama</label>
                <input class="input-field" type="text" name="name" id="name" required>
              </div>
              <div class="input-group">
                <label class="input-label" for="email">Email</label>
                <input class="input-field" type="email" name="email" id="email" required>
              </div>
              <div class="input-group">
                <label class="input-label" for="password">Kata Sandi</label>
                <input class="input-field" type="password" name="password" id="password" required>
              </div>
              <div class="input-group">
                <label class="input-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
                <input class="input-field" type="password" name="password_confirmation" id="password_confirmation" required>
              </div>
              <button type="submit" class="submit-button">Daftar</button>
            </form>
            <p class="form-note">Sudah punya akun? <a href="{{ route('login.form') }}"><button type="submit" class="bg-green-700 text-white px-6 py-2 rounded-lg hover:bg-green-800 transition-colors duration-200">
              Masuk
              </button>
              </a>
            </p>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection