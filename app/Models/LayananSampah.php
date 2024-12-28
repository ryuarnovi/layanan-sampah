<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananSampah extends Model
{
    use HasFactory;

    protected $table = 'layanan_sampah'; // Nama tabel
    protected $fillable = ['nama_layanan', 'deskripsi', 'harga']; // Kolom yang dapat diisi
}