@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        {{-- Author and Date Info --}}
        <div class="flex items-center space-x-4 mb-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-600">{{ substr($post->user->name, 0, 1) }}</span>
                </div>
            </div>
            <div>
                <p class="text-gray-800 font-medium">{{ $post->user->name }}</p>
                <p class="text-gray-500 text-sm">{{ $post->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        {{-- Post Title --}}
        <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

        {{-- Post Image - Normal size --}}
        @if($post->image)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $post->image) }}" 
                     alt="{{ $post->title }}"
                     class="rounded-lg w-auto h-auto">
            </div>
        @endif

        {{-- Post Content --}}
        <div class="prose max-w-none mb-6">
            {!! $post->content !!}
        </div>

        {{-- Like Button & Count --}}
        <div class="flex items-center space-x-4 border-t pt-4">
            <button class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <span>{{ $post->likes()->count() }} Likes</span>
            </button>
=======
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        @if($post->image_data)
            <div class="relative h-96 overflow-hidden">
                <img src="data:{{ $post->image_type }};base64,{{ $post->image_data }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
            </div>
        @endif
        
        <div class="p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
            
            <div class="flex items-center mb-6">
                <img src="{{ $post->user->avatar ? asset('storage/'.$post->user->avatar) : asset('images/icon/user.png') }}" 
                     alt="{{ $post->user->name }}" 
                     class="w-10 h-10 rounded-full mr-3">
                <div class="text-gray-600">
                    <p class="font-medium">{{ $post->user->name }}</p>
                    <p>{{ $post->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <div class="prose max-w-none">
                {!! $post->content !!}
            </div>
>>>>>>> fc4e0ccd5667e53ce76d972d2ec3eabdf8196b5e
        </div>
    </div>
</div>
@endsection