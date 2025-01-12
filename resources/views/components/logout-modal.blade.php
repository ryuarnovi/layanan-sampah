{{-- resources/views/components/logout-modal.blade.php --}}
<div id="logoutModal" class="modal-overlay" style="display: none;">
    <div class="logout-modal" role="dialog" aria-labelledby="logout-title" aria-describedby="logout-message">
        <h2 id="logout-title" class="logout-title">Logout</h2>
        <p id="logout-message" class="logout-message">
            Are you sure you want to logout?
            <br>
            Remember, the world is just a click away!
        </p>
        <div class="button-group">
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="action-button">Yes</button>
            </form>
            <button class="action-button cancel-button" onclick="closeLogoutModal()" type="button">No</button>
        </div>
    </div>
</div>

@push('styles')
<style>
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
    
    .logout-modal {
        border-radius: 50px;
        background-color: #fff;
        display: flex;
        max-width: 641px;
        width: 90%;
        flex-direction: column;
        overflow: hidden;
        align-items: start;
        color: #000;
        padding: 38px 53px;
        font: 400 25px 'Istok Web', sans-serif;
        transform: translateY(-20px);
        transition: transform 0.3s ease;
    }
    
    .modal-overlay.active .logout-modal {
        transform: translateY(0);
    }
    
    .logout-title {
        font: 32px 'Mochiy Pop One', sans-serif;
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
        background-color: #328f25;
        color: #fff;
        font-weight: 700;
        text-align: center;
        padding: 12px 55px;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, background-color 0.2s ease;
    }
    
    .action-button:hover {
        transform: scale(1.05);
        background-color: #2d8021;
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
</style>
@endpush

@push('scripts')
<script>
function showLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.style.display = 'flex';
    setTimeout(() => modal.classList.add('active'), 10);
    
    const closeOnOutsideClick = (e) => {
        if (e.target === modal) closeLogoutModal();
    };
    
    const closeOnEscape = (e) => {
        if (e.key === 'Escape') closeLogoutModal();
    };
    
    modal.addEventListener('click', closeOnOutsideClick);
    document.addEventListener('keydown', closeOnEscape);
    
    // Cleanup listeners when modal closes
    modal.addEventListener('transitionend', function cleanup() {
        if (!modal.classList.contains('active')) {
            modal.removeEventListener('click', closeOnOutsideClick);
            document.removeEventListener('keydown', closeOnEscape);
            modal.removeEventListener('transitionend', cleanup);
        }
    });
}

function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('active');
    setTimeout(() => modal.style.display = 'none', 300);
}
</script>
@endpush