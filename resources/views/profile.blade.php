@extends('layouts.app')

@section('title', 'Halaman Profil')

@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

<!-- Modal Overlay -->
<div id="logoutModal" class="modal-overlay" style="display: none;">
    <div class="logout-modal" role="dialog" aria-labelledby="logout-title" aria-describedby="logout-message">
        <h2 id="logout-title" class="logout-title">Logout</h2>
        <p id="logout-message" class="logout-message">
            Are you sure you want to logout?
            <br />
            Remember, the world is just a click away!
        </p>
        <div class="button-group">
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="action-button">Yes</button>
            </form>
            <button class="action-button cancel-button" onclick="closeLogoutModal()">No</button>
        </div>
    </div>
</div>

<div class="profile-container">
    <div class="profile-wrapper">
        <img src="{{ asset('images/background/profile-background.png') }}" class="background-image" alt="Background" />
        <div class="content-wrapper">
            <div class="profile-sidebar">
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="profile-avatar" alt="Profile photo of {{ Auth::user()->name }}" />
                @else
                    <img src="{{ asset('images/default-avatar.jpg') }}" class="profile-avatar" alt="Profile photo of {{ Auth::user()->name }}" />
                @endif
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-location">{{ Auth::user()->location ?? 'Location not set' }}</div>
                <a href="{{ route('profile.edit') }}" class="action-button">Update Profile</a>
                <a href="{{ route('profile.setting') }}" class="action-button">Setting</a>
                <button onclick="showLogoutModal()" class="action-button">Logout</button>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="form-container">
                @csrf
                @method('PUT')
                
                <h1 class="form-title">PROFILE</h1>
                
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" 
                    value="{{ Auth::user()->email }}" {{ Auth::user()->google_id ? 'readonly' : '' }} />
                
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-input" 
                    value="{{ Auth::user()->name }}" />
                
                <label for="location" class="form-label">Asal</label>
                <input type="text" id="location" name="location" class="form-input" 
                    value="{{ Auth::user()->location }}" />
                
                <button type="submit" class="submit-button">EDIT</button>
            </form>
        </div>
    </div>
</div>

<style>
/* Modal Overlay */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.modal-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* Modal Content */
.logout-modal {
    border-radius: 50px;
    background-color: rgba(255, 255, 255, 1);
    display: flex;
    max-width: 641px;
    width: 90%;
    flex-direction: column;
    overflow: hidden;
    align-items: start;
    color: rgba(0, 0, 0, 1);
    padding: 38px 53px;
    font: 400 25px Istok Web, sans-serif;
    transform: translateY(-20px);
    transition: transform 0.3s ease;
}

.modal-overlay.active .logout-modal {
    transform: translateY(0);
}

.logout-title {
    font: 32px Mochiy Pop One, sans-serif;
    margin: 0;
}

.logout-message {
    margin-top: 7px;
}

.button-group {
    align-self: end;
    display: flex;
    margin-top: 7px;
    gap: 13px;
}

.action-button {
    border-radius: 30px;
    background-color: rgba(50, 143, 37, 1);
    color: rgba(255, 255, 255, 1);
    font-weight: 700;
    text-align: center;
    padding: 12px 55px;
    border: none;
    cursor: pointer;
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.action-button:hover {
    transform: scale(1.05);
    background-color: rgba(45, 128, 33, 1);
}

.action-button:focus {
    outline: 2px solid #000;
    outline-offset: 2px;
}

.cancel-button {
    background-color: #dc3545;
}

.cancel-button:hover {
    background-color: #c82333;
}

@media (max-width: 991px) {
    .logout-modal {
        padding: 30px;
        width: 95%;
        margin: 20px;
    }
    
    .button-group {
        flex-direction: column;
        width: 100%;
    }
    
    .action-button {
        width: 100%;
        padding: 12px 20px;
    }
}

.visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}
</style>

<script>
function showLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.style.display = 'flex';
    setTimeout(() => {
        modal.classList.add('active');
    }, 10);
    
    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeLogoutModal();
        }
    });
    
    // Handle escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLogoutModal();
        }
    });
}

function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('active');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}
</script>
@endsection