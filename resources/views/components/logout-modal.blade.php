{{-- resources/views/components/logout-modal.blade.php --}}
<div id="logoutModal" class="modal-overlay" style="display: none;">
    <div class="logout-modal" role="dialog" aria-labelledby="logout-title" aria-describedby="logout-message">
        <h2 id="logout-title" class="logout-title">Logout</h2>
        <p id="logout-message" class="logout-message">
            Are you sure you want to logout?
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
        background-color: #fff;
        border-radius: 8px;
        padding: 24px;
        width: 400px;
        margin: 20px;
        transform: translateY(-20px);
        transition: transform 0.3s ease;
    }
    
    .modal-overlay.active .logout-modal {
        transform: translateY(0);
    }
    
    .logout-title {
        font-size: 20px;
        font-weight: 600;
        margin: 0 0 16px 0;
        color: #333;
    }
    
    .logout-message {
        font-size: 16px;
        margin: 0 0 20px 0;
        color: #666;
    }
    
    .button-group {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }
    
    .action-button {
        padding: 8px 16px;
        border-radius: 4px;
        border: none;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    
    .action-button {
        background-color: #4CAF50;
        color: white;
    }
    
    .action-button:hover {
        background-color: #45a049;
    }
    
    .cancel-button {
        background-color: #f44336;
    }
    
    .cancel-button:hover {
        background-color: #da190b;
    }
    
    @media (max-width: 480px) {
        .logout-modal {
            width: 90%;
            padding: 20px;
        }
        
        .button-group {
            flex-direction: row;
            width: 100%;
        }
        
        .action-button {
            flex: 1;
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