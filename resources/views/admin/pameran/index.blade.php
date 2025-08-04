@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Pameran Karya Disabilitas</h1>
    <a href="{{ route('admin.pameran.create') }}" class="btn btn-primary mb-3">Tambah Pameran</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Nama Pemilik</th>
                <th>Asal Pemilik</th>
                <th>Deskripsi Karya</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pameran as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->nama_pemilik }}</td>
                <td>{{ $item->asal_pemilik }}</td>
                <td>{{ Str::limit($item->deskripsi_karya, 50) }}</td>
                <td>
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.pameran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.pameran.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
