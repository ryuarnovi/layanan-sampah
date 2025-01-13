<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verification_token' => Str::random(32),
        ]);

        $this->sendVerificationEmail($user);

        return redirect()->route('login.form')
            ->with('status', 'Pendaftaran berhasil! Silakan periksa email Anda untuk verifikasi.');
    }

    private function sendVerificationEmail($user)
    {
        Mail::send('emails.verify', ['user' => $user], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Verifikasi Email Anda');
        });
    }

    public function verify($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('login.form')
                ->with('error', 'Token verifikasi tidak valid.');
        }

        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return redirect()->route('login.form')
            ->with('status', 'Email berhasil diverifikasi! Silakan login.');
    }
}