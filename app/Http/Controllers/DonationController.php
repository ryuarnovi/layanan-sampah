<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DonationNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    public function show()
    {
        return view('donasi.donasi');
    }
    public function showDonationForm()
    {
        return view('donasi.payment');
    }

    public function processDonation(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'amount' => 'required|numeric|min:1',
                'payment_method' => 'required|string',
            ]);
    
            // Log data yang diterima
            Log::info('Received donation request:', $validated);
    
            $donationDetails = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'amount' => $validated['amount'],
                'payment_method' => $validated['payment_method'],
                'transaction_id' => uniqid('TXN-'),
                'date' => now()->format('Y-m-d H:i:s')
            ];
    
            // Ambil user dan cek notification settings
            $user = auth()->user();
            
            // Log untuk debugging
            Log::info('User notification settings:', [
                'user_id' => $user->id ?? 'guest',
                'email_notifications' => $user->email_notifications ?? 'N/A'
            ]);
    
            // Kirim email hanya jika notifikasi diaktifkan
            if ($user && $user->email_notifications) {
                Log::info('Attempting to send email to: ' . $validated['email']);
                Mail::to($validated['email'])->send(new DonationNotification($donationDetails));
                Log::info('Email sent successfully');
            } else {
                Log::info('Email notification skipped - notifications disabled');
            }
    
            return redirect()->back()->with('success', 'Terima kasih! Donasi Anda telah kami terima.');
    
        } catch (\Exception $e) {
            Log::error('Error processing donation: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
    
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf, terjadi kesalahan dalam memproses donasi Anda. ' . $e->getMessage());
        }
    }

}