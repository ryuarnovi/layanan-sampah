<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $googleUser->id)->first();

            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            }

            // Cek apakah email sudah terdaftar
            $existingUser = User::where('email', $googleUser->email)->first();
            
            if($existingUser) {
                return redirect()->route('login')->with([
                    'error' => true,
                    'message' => 'Email ini sudah terdaftar. Silakan login menggunakan password atau gunakan email lain.'
                ]);
            }

            $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id'=> $googleUser->id,
                'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser);
            return redirect()->intended('dashboard');

        } catch (QueryException $e) {
            return redirect()->route('login')->with([
                'error' => true,
                'message' => 'Email ini sudah terdaftar. Silakan login menggunakan password atau gunakan email lain.'
            ]);
        } catch (Exception $e) {
            return redirect()->route('login')->with([
                'error' => true,
                'message' => 'Terjadi kesalahan. Silakan coba lagi.'
            ]);
        }
    }
}