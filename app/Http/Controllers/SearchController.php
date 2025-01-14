<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        $posts = Post::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->paginate(12);

        return view('search.results', compact('posts', 'query'));
    }
}