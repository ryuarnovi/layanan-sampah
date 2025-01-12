<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // Get all posts with user and comments relationships
        $posts = Post::with(['user', 'comments', 'likes'])->latest()->get();
        $users = User::all();
    
        return view('posts.index', compact('posts', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);
    
        $validated['user_id'] = Auth::id();
    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }
    
        Post::create($validated);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function like(Post $post)
    {
        $user = auth()->user();
        $liked = $post->liked;
        
        if ($liked) {
            $post->likes()->where('user_id', $user->id)->delete();
        } else {
            $post->likes()->create([
                'user_id' => $user->id
            ]);
        }
        
        return response()->json([
            'success' => true,
            'likes_count' => $post->likes()->count(),
            'liked' => !$liked,
        ]);
    }
}