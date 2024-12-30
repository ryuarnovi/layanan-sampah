@extends('layouts.app')

@section('title', 'Home - Layanan Sampah')

@section('content')
<div class="container mx-auto px-4">
    <!-- Hero Section -->
    <div class="text-center py-12">
        <h1 class="text-4xl font-bold mb-4">Lorem ipsum dolor sit amet</h1>
        <p class="text-lg text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

    <!-- Features Navigation -->
    <nav class="flex justify-center space-x-8 py-6 border-b border-gray-200">
        <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors duration-200" data-slide="0">Image 1</a>
        <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors duration-200" data-slide="1">Image 2</a>
        <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors duration-200" data-slide="2">Image 3</a>
        <a href="#" class="text-gray-600 hover:text-blue-500 transition-colors duration-200" data-slide="3">Image 4</a>
    </nav>

    <!-- Slide Image Section -->
    <section class="py-12">
        <div class="relative">
            <div class="slide-container overflow-hidden">
                <div class="slides flex transition-transform duration-500" style="width: 400%;">
                    <img src="/api/placeholder/600/400" alt="Image 1" class="w-1/2 rounded-lg shadow-lg"/>
                    <img src="/api/placeholder/600/400" alt="Image 2" class="w-1/2 rounded-lg shadow-lg"/>
                    <img src="/api/placeholder/600/400" alt="Image 3" class="w-1/2 rounded-lg shadow-lg"/>
                    <img src="/api/placeholder/600/400" alt="Image 4" class="w-1/2 rounded-lg shadow-lg"/>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <img src="/api/placeholder/600/400" alt="Content section" class="rounded-lg shadow-lg"/>
            <div class="space-y-4">
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-12">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2">
                <h2 class="text-2xl font-semibold mb-4">boleh di utak atik kalo kurang sreg</h2>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <img src="/api/placeholder/600/400" alt="About section" class="md:w-1/2 rounded-lg shadow-lg"/>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 bg-gray-50 rounded-lg">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <img src="/api/placeholder/600/400" alt="CTA section" class="md:w-1/2 rounded-lg shadow-lg"/>
            <div class="md:w-1/2 space-y-4">
                <h2 class="text-2xl font-semibold">Lorem ipsum dolor sit amet</h2>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                    REGISTER
                </button>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelector('.slides');
        const links = document.querySelectorAll('nav a');

        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const slideIndex = this.getAttribute('data-slide');
                const slideWidth = slides.querySelector('img').clientWidth;
                slides.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
            });
        });
    });
</script>
@endsection