@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: -100px;">
    <h1>{{ $lowongan->judul }}</h1>
    <hr>
    @if($lowongan->gambar)
    <img src="{{ asset('storage/' . $lowongan->gambar) }}"
         alt="{{ $lowongan->judul }}"
         class="img-fluid float-start me-3 mb-3">
    @endif
    <p><strong>Perusahaan:</strong> {{ $lowongan->perusahaan }}</p>
    <p><strong>Lokasi:</strong> {{ $lowongan->lokasi }}</p>

    <h3>Deskripsi Pekerjaan</h3>
    <p>{!! nl2br(e($lowongan->deskripsi)) !!}</p>

    <h3>Cara Melamar</h3>
    <p>{!! nl2br(e($lowongan->cara_melamar)) !!}</p>

    <a href="{{ route('lowongan.index') }}" class="btn btn-primary">Kembali ke Daftar Lowongan</a>
</div>
@endsection
