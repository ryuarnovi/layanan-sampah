@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Layanan Sampah</h1>

        <form action="{{ route('layanan-sampah.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_layanan">Nama Layanan</label>
                <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('layanan-sampah.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection