<?php

namespace App\Http\Controllers;

use App\Models\LayananSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LayananSampahController extends Controller
{
    public function index()
    {
        $layananSampah = LayananSampah::all();
        return view('layanan_sampah.index', compact('layananSampah'));
    }

    public function create()
    {
        return view('layanan_sampah.layanan-sampah-create'); // Mengarahkan ke view create
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        // Simpan data ke database
        LayananSampah::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('layanan-sampah.index')->with('success', 'Layanan sampah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $layananSampah = LayananSampah::findOrFail($id); // Ambil data layanan berdasarkan ID
        return view('layanan_sampah.layanan-sampah-edit', compact('layananSampah')); // Mengarahkan ke view edit
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        // Temukan layanan berdasarkan ID dan update
        $layananSampah = LayananSampah::findOrFail($id);
        $layananSampah->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('layanan-sampah.index')->with('success', 'Layanan sampah berhasil diperbarui.');
    }

    // Metode lain seperti edit, update, destroy
}