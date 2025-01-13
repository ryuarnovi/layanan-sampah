@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
            
            <div class="flex items-center mb-6">
                <img src="{{ $post->user->avatar ? Storage::url($post->user->avatar) : asset('images/default-avatar.jpg') }}" 
                     alt="{{ $post->user->name }}" 
                     class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="font-bold">{{ $post->user->name }}</div>
                    <div class="text-gray-500">{{ $post->created_at->format('d M Y') }}</div>
                </div>
            </div>

            @if($post->image)
                <div class="relative w-full mb-6">
                    <img src="{{ Storage::url('posts/' . $post->image) }}" 
                         alt="Post image" 
                         class="w-full rounded-lg">
                </div>
            @endif

            <div class="prose max-w-none">
                {!! nl2br(e($post->content)) !!}
            </div>

            <div class="mt-6">
                <a href="{{ route('posts.index') }}" 
                   class="inline-flex items-center text-blue-500 hover:underline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Posts
                </a>
            </div>
        </div>
    </div>
</div>
@endsection