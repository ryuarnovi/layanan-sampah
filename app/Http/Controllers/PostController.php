<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Debug upload file
        if ($request->hasFile('image')) {
            \Log::info([
                'has_file' => $request->hasFile('image'),
                'mime' => $request->file('image')->getClientMimeType(),
                'size' => $request->file('image')->getSize()
            ]);
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Resize image
            $img = Image::make($image)
                ->fit(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
            
            // Convert to base64
            $post->image_type = $image->getClientMimeType();
            $post->image_data = base64_encode($img->encode()->encoded);
        }

        $post->save();

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        // Debug image data
        if ($post->image_data) {
            \Log::info([
                'image_type' => $post->image_type,
                'data_length' => strlen($post->image_data)
            ]);
        }

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Resize image
            $img = Image::make($image)
                ->fit(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
            
            // Convert to base64
            $post->image_type = $image->getClientMimeType();
            $post->image_data = base64_encode($img->encode()->encoded);
        }

        $post->save();

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post updated successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post->load([
                'user',
                'likes',
                'comments' => function($query) {
                    $query->latest()->with('user');
                }
            ])
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->with(['user' => function($query) {
                $query->select('id', 'name', 'avatar');
            }])
            ->latest()
            ->paginate(10);

        return view('posts.search', compact('posts', 'query'));
    }
}