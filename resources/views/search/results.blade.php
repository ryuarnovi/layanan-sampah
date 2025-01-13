@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Search Results</h1>
        <p class="text-gray-600">Showing results for: "{{ $query }}"</p>
    </div>

    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2 hover:text-green-600">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        
                        <div class="flex items-center mb-4">
                            <img src="{{ $post->user->avatar ? Storage::url($post->user->avatar) : asset('images/icon/user.png') }}" 
                                 alt="{{ $post->user->name }}" 
                                 class="w-8 h-8 rounded-full mr-2">
                            <div class="text-sm text-gray-600">
                                <p>{{ $post->user->name }}</p>
                                <p>{{ $post->created_at->format('d M Y') }}</p>
                            </div>
                        </div>

                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>

                        <a href="{{ route('posts.show', $post) }}" 
                           class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors duration-200">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->appends(['query' => $query])->links() }}
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600">No posts found matching your search criteria.</p>
        </div>
    @endif
</div>
@endsection