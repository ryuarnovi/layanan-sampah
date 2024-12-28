<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LayananSampah;

class LayananSampahSeeder extends Seeder
{
    public function run()
    {
        LayananSampah::create([
            'nama _layanan' => 'Pengangkutan Sampah',
            'deskripsi' => 'Layanan pengangkutan sampah dari rumah ke tempat pembuangan.',
            'harga' => 100000,
        ]);
    }
}