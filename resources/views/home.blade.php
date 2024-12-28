@section('content')

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <div class="relative">
    <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('images/background/bg_sirih.png') }}" alt="Background Image">
    @extends('layouts.app')
    <div class="flex flex-col min-h-[948px] p-11 pt-0 pb-[220px] relative z-10">
      <div class="bg-cover bg-no-repeat bg-fixed h-24" style="background-image: url('../images/background/bg_sirih.png');"></div>
      <div class="text-center">
        <h1 class="text-4xl font-bold">Lorem ipsum dolor sit amet</h1>
        <p class="mt-4 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
  </div>

  <nav class="flex items-center space-x-4 p-4 bg-white shadow">
    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ce164986ade3990d2b79c930fb16051e55d76c25dcd6536a98f160e278760928?placeholderIfAbsent=true&apiKey=ec0a6845eef9472eafac242bdec5cdb9" class="h-8" alt="" />
    <a href="#" class="text-gray-700 hover:text-blue-500">Home</a>
    <a href="#" class="text-gray-700 hover:text-blue-500">Home</a>
    <a href="#" class="text-gray-700 hover:text-blue-500">Home</a>
    <a href="#" class="text-gray-700 hover:text-blue-500">Home</a>
  </nav>

  <section class="p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e799285f62410191c26ceb31a0d2d1dc82f7d63081bba6ba6a6b6d564ccf3947?placeholderIfAbsent=true&apiKey=ec0a6845eef9472eafac242bdec5cdb9" class="w-full h-auto" alt="Feature illustration" />
      <div>
        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
  </section>

  <section class="p-8">
    <div class="flex flex-col md:flex-row items-center">
      <div class="flex-1">
        <h2 class="text-2xl font-bold">Lorem ipsum dolor sit amet</h2>
        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="flex-1">
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/cf7d22d6d8b09019efd53f102cbdcee70b014317b5545aebe3ef249f2059549a?placeholderIfAbsent=true&apiKey=ec0a6845eef9472eafac242bdec5cdb9" class="w-full h-auto" alt="Information section image" />
      </div>
    </div>
  </section>

  <section class="p-8 bg-gray-100">
    <div class="flex flex-col md:flex-row items-center">
      <div class="flex-1">
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/3e2114be001b18dc0b0c3b608405d341d16635f58cfa719138b67e322acc8bec?placeholderIfAbsent=true&apiKey=ec0a6845 eef9472eafac242bdec5cdb9" class="w-full h-auto" alt="Call to action image" />
      </div>
      <div class="flex-1 p-4">
        <h2 class="text-2xl font-bold">Lorem ipsum dolor sit amet</h2>
        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">REGISTER</button>
      </div>
    </div>
  </section>

  <footer class="bg-gray-800 text-white p-4">
    <div class="text-center">
      <address class="not-italic">
        Contact<br />
        metal5.0@gmail.com<br />
        +62 12345678
      </address>
      <p class="text-sm">@copyright2024 metal 5.0</p>
    </div>
  </footer>

@endsection