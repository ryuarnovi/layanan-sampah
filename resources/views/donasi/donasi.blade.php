@extends('layouts.app')

@section('content')
<div class="donation-section bg-white text-black flex flex-col items-center text-center">
    <div class="hero-container relative min-h-screen w-full flex flex-col items-center p-8 md:p-10 lg:p-16">
        <img loading="lazy" src="{{asset('images/background/bg_donasi.png')}}" class="hero-image absolute inset-0 h-full w-full object-cover object-center opacity-70" alt="Environmental conservation background image" />
        <div class="content-wrapper relative flex flex-col w-full max-w-2xl mx-auto mb-32 p-4 bg-white bg-opacity-80 rounded-lg shadow-lg">
            <h1 class="main-heading text-4xl md:text-5xl font-bold text-green-700">
                Satu donasi Anda menyelamatkan bumi.
            </h1>
            <p class="subheading mt-6 text-lg md:text-xl font-medium text-gray-700">
                Dengan setiap donasi, Anda berkontribusi untuk menjaga lingkungan dan melindungi planet kita.
            </p>
            <a href="{{ route('donasi.payment') }}" class="mt-8">
                <button class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition-colors duration-200">
                    Donasi Sekarang
                </button>
            </a>
        </div>
    </div>
</div>
@endsection