@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->judul }}</h1>

    @if($event->gambar)
        <img src="{{ asset('storage/' . $event->gambar) }}"
             alt="{{ $event->judul }}"
             class="img-thumbnail mb-3"
             style="max-width: 100%; height: auto;">
    @endif

    <p><strong>Penyelenggara:</strong> {{ $event->penyelenggara }}</p>
    <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>

    <h4>Deskripsi</h4>
    <p>{!! nl2br(e($event->deskripsi)) !!}</p>

    <h4>Cara Mendaftar</h4>
    <p>{!! nl2br(e($event->cara_mendaftar)) !!}</p>

    <a href="{{ route('event.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Event</a>
</div>
@endsection
