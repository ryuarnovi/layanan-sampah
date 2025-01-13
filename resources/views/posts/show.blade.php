@extends('layouts.app')

@section('content')
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
        </div>
    </div>
</div>
@endsection