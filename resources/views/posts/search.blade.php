@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Search Form -->
        <form action="{{ route('posts.search') }}" method="GET" class="mb-8">
            <div class="flex items-center bg-white rounded-lg shadow-md p-2">
                <input 
                    type="text" 
                    name="query" 
                    value="{{ $query ?? '' }}"
                    placeholder="Search posts..." 
                    class="flex-1 px-4 py-2 focus:outline-none"
                >
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                    Search
                </button>
            </div>
        </form>

        <!-- Search Results -->
        @if(isset($query))
            <h2 class="text-2xl font-bold mb-6">
                Search Results for "{{ $query }}"
            </h2>
        @endif

        <!-- Posts Grid -->
        <div class="grid gap-6">
            @forelse($posts as $post)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img 
                                src="{{ $post->user->avatar ? asset('storage/'.$post->user->avatar) : asset('images/icon/user.png') }}" 
                                alt="{{ $post->user->name }}" 
                                class="w-10 h-10 rounded-full mr-3"
                            >
                            <div>
                                <div class="font-medium">{{ $post->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $post->created_at->format('d M Y') }}</div>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-green-600 transition-colors">
                                {{ $post->title }}
                            </a>
                        </h3>

                        @if($post->image)
                            <div class="relative h-48 mb-4">
                                <img 
                                    src="{{ asset('storage/' . $post->image) }}" 
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover rounded-lg"
                                >
                            </div>
                        @endif

                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($post->content, 150) }}
                        </p>

                        <a href="{{ route('posts.show', $post) }}" class="text-green-600 hover:text-green-700 font-medium">
                            Read more →
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg">No posts found matching your search.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->appends(['query' => $query])->links() }}
        </div>
    </div>
</div>
@endsection