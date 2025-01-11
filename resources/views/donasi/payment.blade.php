@extends('layouts.app')

@section('title', 'Payment Form - Donasi')

@section('styles')
<style>
    .payment-section {
        min-height: 100vh;
        position: relative;
        padding: 2rem;
    }

    .bg-image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .hero-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0.7;
    }

    .payment-container {
        position: relative;
        z-index: 1;
        max-width: 768px;
        margin: 2rem auto;
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        backdrop-filter: blur(5px);
    }

    .form-title {
        color: #15803d;
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
    }

    .form-group {
        margin-bottom: 1.5rem;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 1rem;
        border-radius: 0.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: border-color 0.2s;
        background-color: white;
    }

    .form-input:focus {
        outline: none;
        border-color: #15803d;
        box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.1);
    }

    .payment-methods {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .payment-method-option {
        background-color: white;
        border: 2px solid #d1d5db;
        border-radius: 0.5rem;
        padding: 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    .payment-method-option:hover {
        border-color: #15803d;
        transform: translateY(-2px);
    }

    .payment-method-option.selected {
        border-color: #15803d;
        background-color: #dcfce7;
    }

    .payment-icon {
        width: 40px;
        height: 40px;
        margin: 0 auto 0.5rem;
    }

    .submit-button {
        width: 100%;
        background-color: #15803d;
        color: white;
        padding: 1rem;
        border: none;
        border-radius: 0.5rem;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        margin-top: 1rem;
    }

    .submit-button:hover {
        background-color: #166534;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .alert {
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background-color: rgba(220, 252, 231, 0.95);
        color: #166534;
        border: 1px solid #86efac;
    }

    .alert-error {
        background-color: rgba(254, 226, 226, 0.95);
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .error-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    @media (max-width: 640px) {
        .payment-section {
            padding: 1rem;
        }
        
        .payment-container {
            margin: 1rem;
            padding: 1rem;
        }
        
        .form-title {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="payment-section">
    <div class="bg-image-container">
        <img loading="lazy" src="{{asset('images/background/bg_donasi.png')}}" class="hero-image" alt="Environmental conservation background image" />
    </div>
    <div class="payment-container">
        <h2 class="form-title">Form Pembayaran Donasi</h2>

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

        @if ($errors->any())
            <div class="alert alert-error">
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('donasi.process') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-input" 
                    value="{{ old('name') }}" 
                    required 
                    placeholder="Masukkan nama lengkap Anda"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-input" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="Masukkan alamat email Anda"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Jumlah Donasi (Rp)</label>
                <input 
                    type="number" 
                    name="amount" 
                    class="form-input" 
                    value="{{ old('amount') }}" 
                    required 
                    min="10000"
                    step="10000"
                    placeholder="Minimal Rp 10.000"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Metode Pembayaran</label>
                <div class="payment-methods">
                    <div class="payment-method-option" data-method="bank_transfer">
                        <img src="{{ asset('images/icons/bank.svg') }}" alt="Bank Transfer" class="payment-icon">
                        <div>Transfer Bank</div>
                    </div>
                    <div class="payment-method-option" data-method="credit_card">
                        <img src="{{ asset('images/icons/credit-card.svg') }}" alt="Credit Card" class="payment-icon">
                        <div>Kartu Kredit</div>
                    </div>
                    <div class="payment-method-option" data-method="e_wallet">
                        <img src="{{ asset('images/icons/e-wallet.svg') }}" alt="E-Wallet" class="payment-icon">
                        <div>E-Wallet</div>
                    </div>
                </div>
                <input type="hidden" name="payment_method" id="payment_method" required>
            </div>

            <button type="submit" class="submit-button">
                Proses Pembayaran
            </button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentOptions = document.querySelectorAll('.payment-method-option');
    const paymentMethodInput = document.getElementById('payment_method');

    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove selected class from all options
            paymentOptions.forEach(opt => opt.classList.remove('selected'));
            
            // Add selected class to clicked option
            this.classList.add('selected');
            
            // Update hidden input value
            paymentMethodInput.value = this.dataset.method;
        });
    });
});
</script>
@endsection