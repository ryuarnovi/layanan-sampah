@extends('layouts.app')

@section('title', 'Post - Community')

@section('content')
<link rel="stylesheet" href="{{asset('css/posts2.css')}}">

<div class="profile-feed">
    <div class="feed-container">
        <div class="feed-layout">
            <!-- Profile Section -->
            <div class="profile-list">
                <div class="profile-card-container">
                    @foreach($users as $user)
                        <div class="profile-card">
                            <div class="profile-header">
                                <div class="avatar-wrapper">
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Profile avatar" class="profile-avatar" />
                                    @else
                                        <img src="{{ asset('images/default-avatar.jpg') }}" alt="Default Avatar" class="profile-avatar" />
                                    @endif
                                    @if(auth()->id() === $user->id)
                                        <label class="avatar-upload" for="avatar-input">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                                                <circle cx="12" cy="13" r="4"/>
                                            </svg>
                                        </label>
                                        <input type="file" id="avatar-input" hidden accept="image/*">
                                    @endif
                                </div>
                                <div class="user-details">
                                    <div class="username">{{ $user->name }}</div>
                                    <div class="location">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                        {{ $user->location ?? 'Location not set' }}
                                    </div>
                                </div>
                            </div>
                            
                            @if($user->bio)
                                <div class="profile-bio">
                                    {{ $user->bio }}
                                </div>
                            @endif

                            <div class="profile-actions">
                                @if(auth()->id() !== $user->id)
                                    <button class="btn btn-secondary">Message</button>
                                @else
                                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Post Form with Enhanced Features -->
                <div class="post-form">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-error">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

<<<<<<< HEAD
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="post-form">                        @csrf
=======
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="post-form">

                        @csrf
>>>>>>> fc4e0ccd5667e53ce76d972d2ec3eabdf8196b5e
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required placeholder="Enter your post title">
                        </div>
                        
                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control" required placeholder="What's on your mind?"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Add Photo</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <div id="image-preview" class="image-preview" style="display: none;">
                                <img src="" alt="Preview">
                                <div class="remove-image">&times;</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 2L11 13"></path>
                                <path d="M22 2L15 22L11 13L2 9L22 2z"></path>
                            </svg>
                            Post
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Enhanced Posts Display -->
            <div class="feed-content">
                <div class="post-container">
                    @foreach($posts as $post)
                        <div class="post-card" id="post-{{ $post->id }}">
                            <div class="post-header">
                                <img src="{{ $post->user->avatar ? asset('storage/' . $post->user->avatar) : asset('images/default-avatar.jpg') }}" 
                                     alt="User  avatar" 
                                     class="post-avatar" />
                                
                                <div class="post-user-info">
                                    <div class="post-username">{{ $post->user->name }}</div>
                                    <div class="post-time">{{ $post->created_at->diffForHumans() }}</div>
                                </div>
            
                                @if(auth()->id() === $post->user_id)
                                    <div class="post-menu">
                                        <button class="post-menu-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <circle cx="12" cy="4" r="2"></circle>
                                                <circle cx="12" cy="20" r="2"></circle>
                                            </svg>
                                        </button>
                                        <div class="post-menu-content">
                                            <div class="menu-item edit-post" data-post-id="{{ $post->id }}">Edit</div>
                                            <div class="menu-item delete-post" data-post-id="{{ $post->id }}">Delete</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
            
                            <div class="post-title">{{ $post->title }}</div>
                            <div class="post-content">{{ $post->content }}</div>
            
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="post-image">
                            @endif
            
                            <div class="post-actions">
                                <div class="action-group">
                                    <button class="action-button like-button {{ $post->liked ? 'liked' : '' }}" data-post-id="{{ $post->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54z"/>
                                        </svg>
                                    </button>
                                    <span>{{ $post->likes()->count() }}</span>
                                    <button class="action-button comment-button" data-post-id="{{ $post->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                                        </svg>
                                        <span>{{ $post->comments_count ?? 0 }}</span>
                                    </button>
                                </div>
                            </div>
            
                            <!-- Comments Section -->
                            <div class="comments-list">
                            <div class="comment-section" id="comments-{{ $post->id }}">
                                <form class="comment-form" action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="text" name="content" class="comment-input" placeholder="Add a comment...">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
            
                                <div class="comments-list">
                                    @foreach($post->comments->take(3) as $comment)
                                        <div class="comment-item">
                                            <img src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('images/default-avatar.jpg') }}" 
                                                 alt="Commenter avatar" 
                                                 class="comment-avatar">
                                            <div class="comment-content">
                                                <div class="comment-username">{{ $comment->user->name }}</div>
                                                <div class="comment-text">{{ $comment->content }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image Preview Handler
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const previewImage = imagePreview.querySelector('img');
    const removeImageButton = imagePreview.querySelector('.remove-image');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                imagePreview.style.display = 'inline-block';
            }
            reader.readAsDataURL(file);
        }
    });

    removeImageButton.addEventListener('click', function() {
        imageInput.value = '';
        imagePreview.style.display = 'none';
        previewImage.src = '';
    });

    // Like Button Handler
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.dataset.postId;
            const likeCount = this.querySelector('span');
            
            fetch(`/posts/${postId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.classList.toggle('liked');
                    likeCount.textContent = data.likes_count;
                }
            });
        });
    });

    // Post Menu Handler
    document.querySelectorAll('.post-menu-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const menu = this.closest('.post-menu');
            menu.classList.toggle('active');
            e.stopPropagation();
        });
    });

    // Close menu when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
    // Close active menus when clicking anywhere
    document.addEventListener('click', function() {
        document.querySelectorAll('.post-menu.active').forEach(menu => {
            menu.classList.remove('active');
        });
    });

    // Delete Post Handler
    document.querySelectorAll('.delete-post').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            
            if (!confirm('Are you sure you want to delete this post?')) {
                return;
            }

            const postId = this.dataset.postId;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            try {
                const response = await fetch(`/posts/${postId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                });

                const data = await response.json();

                if (data.success) {
                    const postElement = document.getElementById(`post-${postId}`);
                    if (postElement) {
                        postElement.remove();
                    }
                } else {
                    alert(data.message || 'Failed to delete post');
                }
            } catch (error) {
                console.error('Error deleting post:', error);
                alert('An error occurred while deleting the post');
            }
        });
    });
});
</script>
@endsection