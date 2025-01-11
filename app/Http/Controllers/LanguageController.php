<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change($lang)
    {
        // Validasi bahasa yang diterima
        if (in_array($lang, ['en', 'id', 'fr'])) {
            // Simpan pilihan bahasa ke dalam session
            Session::put('locale', $lang);
        }
        // Kembali ke halaman sebelumnya
        return redirect()->back();
    }
}