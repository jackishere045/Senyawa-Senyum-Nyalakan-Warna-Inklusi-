@extends('layouts.app')

@section('content')
<section id="jobs" class="bg-light" style="padding-top: 10px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h2 class="section-heading">Daftar Event Disabilitas</h2>
        <hr class="my-4">
      </div>
    </div>

    <div class="row">
      @foreach ($events as $event)
      <div class="col-lg-4 col-md-6">
        <div class="card mb-5 mb-lg-0">
          <img src="{{ asset('storage/' . $event->gambar) }}" alt="Poster Event" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ $event->judul }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $event->penyelenggara }}</h6>
            <p class="card-text">{{ $event->lokasi }}</p>
            <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">Lihat Detail</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>
@endsection
