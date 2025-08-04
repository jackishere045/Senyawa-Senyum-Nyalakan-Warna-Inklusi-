@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Lowongan</h1>
    <a href="{{ route('admin.lowongan.create') }}" class="btn btn-primary mb-3">Tambah Lowongan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Judul</th>
            <th>Perusahaan</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Cara Melamar</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach($lowongan as $loker)
        <tr>
            <td>{{ $loker->judul }}</td>
            <td>{{ $loker->perusahaan }}</td>
            <td>{{ $loker->lokasi }}</td>
            <td>{{ Str::limit($loker->deskripsi, 50) }}</td>
            <td>{{ Str::limit($loker->cara_melamar, 50) }}</td>
            <td>
                @if($loker->gambar)
                    <img src="{{ asset('storage/'.$loker->gambar) }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.lowongan.edit', $loker->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.lowongan.destroy', $loker->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
