@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        
        <div class="flex items-center mb-6">
            <img src="{{ $post->user->avatar }}" 
                 alt="{{ $post->user->name }}" 
                 class="w-12 h-12 rounded-full mr-4">
            <div>
                <div class="font-bold">{{ $post->user->name }}</div>
                <div class="text-gray-500">
                    {{ $post->created_at->format('d M Y') }}
                </div>
            </div>
        </div>

        @if($post->image)
        <img src="{{ Storage::url($post->image) }}" 
             alt="Post image" 
             class="w-full rounded-lg mb-6">
        @endif

        <div class="prose max-w-none">
            {{ $post->content }}
        </div>

        <div class="mt-6">
            <a href="{{ route('news.index') }}" 
               class="text-blue-500 hover:underline">
                &larr; Back to Posts
            </a>
        </div>
    </div>
</div>
@endsection