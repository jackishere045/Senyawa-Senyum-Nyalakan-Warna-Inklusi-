@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Pameran Karya</h1>

    <form action="{{ route('admin.pameran.update', $pameran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $pameran->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" value="{{ $pameran->nama_pemilik }}" required>
        </div>
        <div class="mb-3">
            <label>Asal Pemilik</label>
            <input type="text" name="asal_pemilik" class="form-control" value="{{ $pameran->asal_pemilik }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi Karya</label>
            <textarea name="deskripsi_karya" class="form-control">{{ $pameran->deskripsi_karya }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            @if($pameran->gambar)
                <p><img src="{{ asset('storage/'.$pameran->gambar) }}" width="120"></p>
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.pameran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
