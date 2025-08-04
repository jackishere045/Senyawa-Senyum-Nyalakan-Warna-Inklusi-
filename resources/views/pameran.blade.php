@extends('layouts.app')

@section('content')
<main>
  <section id="jobs" class="bg-light" style="padding-top: 10px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="section-heading">Daftar Pameran Karya Disabilitas</h2>
          <hr class="my-4">
        </div>
      </div>

      <div class="row">
        @foreach ($pameran as $pameran)
        <div class="col-lg-4 col-md-6">
          <div class="card mb-5 mb-lg-0">
            <img src="{{ asset('storage/' . $pameran->gambar) }}" alt="Poster Pameran" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{ $pameran->judul }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $pameran->nama_pemilik }}</h6>
              <p class="card-text">{{ $pameran->asal_pemilik }}</p>
              <a href="{{ route('pameran.show', $pameran->id) }}" class="btn btn-primary">Lihat Deskripsi</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</main>
@endsection
