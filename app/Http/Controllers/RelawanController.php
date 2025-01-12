<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\VolunteerRegistration;
use Exception;

class RelawanController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        try {
            // Send email to volunteer
            Mail::to($request->email)->send(new VolunteerRegistration([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'whatsapp_link' => 'hhttps://chat.whatsapp.com/InAu65xnYlA4AsJnmw5JnK' // Replace with your actual WhatsApp group link
            ]));

            return redirect()->back()->with('success', 'Pendaftaran berhasil! Silakan cek email Anda untuk informasi selanjutnya.');
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Volunteer registration error: ' . $e->getMessage());
            
            // You can also log additional context if needed
            Log::error('Volunteer registration error', [
                'error' => $e->getMessage(),
                'user_email' => $request->email,
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }

    public function showRegistrationForm()
    {
        return view('relawan.register');
    }
}