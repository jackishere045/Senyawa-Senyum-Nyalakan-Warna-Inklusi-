@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Lowongan</h1>

    <form action="{{ route('admin.lowongan.update', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $lowongan->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Perusahaan</label>
            <input type="text" name="perusahaan" class="form-control" value="{{ $lowongan->perusahaan }}" required>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $lowongan->lokasi }}" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            @if($lowongan->gambar)
                <img src="{{ asset('storage/'.$lowongan->gambar) }}" width="100"><br>
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Cara Melamar</label>
            <textarea name="cara_melamar" class="form-control" rows="5">{{ old('cara_melamar', $lowongan->cara_melamar) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
