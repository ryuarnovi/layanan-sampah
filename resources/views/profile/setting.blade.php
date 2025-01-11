@extends('layouts.app')

@section('title', 'Setting - Layanan Sampah')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&family=Mochiy+Pop+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/setting.css') }}">
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-wrapper">
        <img 
            src="{{ asset('images/background/profile-background.png') }}" 
            class="background-image" 
            alt="Background"
        />
        
        <div class="content-wrapper">
            <!-- Profile Sidebar -->
            <div class="profile-sidebar">
                @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="profile-avatar" alt="Profile photo of {{ Auth::user()->name }}" />
            @else
                <img src="{{ asset('images/default-avatar.jpg') }}" class="profile-avatar" alt="Profile photo of {{ Auth::user()->name }}" />
            @endif
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-location">{{ Auth::user()->location }}</div>
                <a href="{{ route('profile.edit') }}" class="action-button">Update Profile</a>
                <a href="{{ route('profile.setting') }}" class="action-button">Setting</a>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="action-button">Logout</button>
                </form>
            </div>

            <!-- Settings Panel -->
            <div class="form-container">
                <h2 class="form-title">SETTING</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('profile.updateNotifications') }}" method="POST">
                    @csrf
                    <div class="setting-item" id="notification-setting">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                
                        @if(session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif
                
                        <label for="email_notifications">Notifikasi Email:</label>
                        <div class="toggle-switch">
                            <input 
                                type="checkbox" 
                                id="email_notifications" 
                                name="email_notifications" 
                                {{ Auth::user()->email_notifications ? 'checked' : '' }}
                                value="1"
                            >
                            <label for="email_notifications" class="toggle-label"></label>
                        </div>
                        <button type="submit" class="save-button">Simpan</button>
                    </div>
                </form>

                <!-- Theme Setting -->
                <form action="{{ route('profile.updateTheme') }}" method="POST">
                    @csrf
                    <div class="setting-item" id="theme-setting">
                        <label for="theme">Pilih Tema:</label>
                        <select name="theme" id="theme">
                            <option value="light" {{ $theme == 'light' ? 'selected' : '' }}>Tema Terang</option>
                            <option value="dark" {{ $theme == 'dark' ? 'selected' : '' }}>Tema Gelap</option>
                        </select>
                        <button type="submit">Simpan</button>
                    </div>
                </form>

                <form action="{{ route('language.change', 'en') }}" method="GET" class="language-form">
                    <label for="lang">Pilih Bahasa:</label>
                    <select name="lang" onchange="this.form.action='{{ url('/language') }}/'+this.value; this.form.submit();">
                        <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="id" {{ session('locale') == 'id' ? 'selected' : '' }}>Bahasa Indonesia</option>
                        <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
                    </select>
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Theme functionality
    const body = document.body;
    
    // Get theme from localStorage or use system default
    const savedTheme = localStorage.getItem('theme') || 'light';
    body.classList.add(`${savedTheme}-theme`);

    const themeSelect = document.getElementById('theme');
    if (themeSelect) {
        // Set initial value of select based on current theme
        themeSelect.value = savedTheme;
        
        themeSelect.addEventListener('change', async function() {
            const selectedTheme = this.value;
            
            try {
                // Make API call to update theme
                const response = await fetch('/settings/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        type: 'theme',
                        value: selectedTheme
                    })
                });

                if (!response.ok) throw new Error('Failed to update theme');

                // Update UI
                body.classList.remove('light-theme', 'dark-theme');
                body.classList.add(`${selectedTheme}-theme`);
                localStorage.setItem('theme', selectedTheme);
                
                showNotification('Theme updated successfully', 'success');
            } catch (error) {
                console.error('Error updating theme:', error);
                showNotification('Failed to update theme', 'error');
                // Revert select value on error
                themeSelect.value = savedTheme;
            }
        });
    }

// Language functionality
const languageOptions = document.querySelectorAll('.language-option');

languageOptions.forEach(option => {
    option.addEventListener('click', async function(e) {
        e.preventDefault(); // Prevent default link behavior
        const language = this.dataset.language;
        
        try {
            const response = await fetch('/profile/update-language', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ language })
            });
            
            const data = await response.json();
            
            if (data.success) {
                // Update UI
                languageOptions.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                
                showNotification(data.message, 'success');
                
                // Reload page after delay to apply language changes
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                throw new Error(data.message || 'Failed to update language');
            }
        } catch (error) {
            console.error('Error:', error);
            showNotification(error.message, 'error');
        }
    });
});

    // Notification handling
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.add('fade-out');
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 2500);
    }

    // Handle existing alerts
    document.querySelectorAll('.alert, .notification').forEach(alert => {
        setTimeout(() => {
            alert.classList.add('fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 2500);
    });
});
</script>

@endsection