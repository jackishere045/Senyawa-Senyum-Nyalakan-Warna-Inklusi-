@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Pameran Karya</h1>

    <form action="{{ route('admin.pameran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Asal Pemilik</label>
            <input type="text" name="asal_pemilik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi Karya</label>
            <textarea name="deskripsi_karya" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pameran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
