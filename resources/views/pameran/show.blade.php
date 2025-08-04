@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: -100px;">
    <h2>{{ $pameran->judul }}</h2>
    <hr>

    @if($pameran->gambar)
        <img src="{{ asset('storage/' . $pameran->gambar) }}" alt="{{ $pameran->judul }}" class="img-fluid mb-4">
    @endif

    <h5>Nama Pemilik:</h5>
    <p>{{ $pameran->nama_pemilik }}</p>

    <h5>Asal Pemilik:</h5>
    <p>{{ $pameran->asal_pemilik }}</p>

    <h5>Deskripsi Karya:</h5>
    <p>{{ $pameran->deskripsi_karya }}</p>

    <a href="{{ route('pameran.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Pameran</a>
</div>
@endsection
