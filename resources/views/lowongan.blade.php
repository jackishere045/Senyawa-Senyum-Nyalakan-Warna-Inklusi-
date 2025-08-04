@extends('layouts.app')

@section('title', 'Daftar Lowongan Kerja')

@section('content')
<section id="jobs" class="bg-light" style="padding-top: 10px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h2 class="section-heading">Daftar Lowongan Kerja</h2>
        <hr class="my-4">
      </div>
    </div>

    <div class="row">
      @foreach($lowongan as $loker)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img src="{{ asset('storage/' . $loker->gambar) }}" alt="Poster Lowongan Kerja" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{ $loker->judul }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $loker->perusahaan }}</h6>
              <p class="card-text">{{ $loker->lokasi }}</p>
              <a href="{{ route('lowongan.show', $loker->id) }}" class="btn btn-primary">Lihat Deskripsi</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
