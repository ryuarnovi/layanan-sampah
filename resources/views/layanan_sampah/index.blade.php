@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Postingan</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            @if($post->donor)
                <p>Donor: {{ $post->donor->name }} ({{ $post->donor->email }})</p>
            @else
                <p>Donor: Tidak ada</p>
            @endif
        </div>
    @endforeach
</div>
    <div class="container">
        <h1>Layanan Sampah</h1>
        <a href="{{ route('layanan-sampah.create') }}" class="btn btn-primary mb-3">Tambah Layanan</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layananSampah as $layanan)
                    <tr>
                        <td>{{ $layanan->nama_layanan }}</td>
                        <td>{{ $layanan->deskripsi }}</td>
                        <td>{{ number_format($layanan->harga, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('layanan-sampah.edit', $layanan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('layanan-sampah.destroy', $layanan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection