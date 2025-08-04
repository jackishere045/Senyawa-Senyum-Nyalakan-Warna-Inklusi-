@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $event->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Penyelenggara</label>
            <input type="text" name="penyelenggara" class="form-control" value="{{ $event->penyelenggara }}" required>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $event->lokasi }}" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $event->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Cara Mendaftar</label>
            <textarea name="cara_mendaftar" class="form-control">{{ $event->cara_mendaftar }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
