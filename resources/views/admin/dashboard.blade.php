@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>

    <div class="container py-4">
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card border border-3 border-primary shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Lowongan</h5>
                    <h2>{{ $totalLowongan }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border border-3 border-info shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Sekolah</h5>
                    <h2>{{ $totalSekolah }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border border-3 border-success shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Event</h5>
                    <h2>{{ $totalEvent }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border border-3 border-warning shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Pameran</h5>
                    <h2>{{ $totalPameran }}</h2>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Baris baru: Link Ajuan -->
<div class="row mt-4">
  <!-- Lowongan -->
  <div class="col-md-4 mb-3">
    <div class="card bg-primary text-white">
      <div class="card-body text-center">
        <h5 class="card-title mb-3">Ajuan Lowongan</h5>
        <a href="https://docs.google.com/forms/d/1QTivRspLIJWaQ8FDRYXznqL_80XXE510TQk4h-t0usM/edit#responses" 
           target="_blank" 
           class="btn btn-light btn-sm">
          <i class="bi bi-link-45deg"></i> Form Ajuan
        </a>
      </div>
    </div>
  </div>

  <!-- Event -->
  <div class="col-md-4 mb-3">
    <div class="card bg-primary text-white">
      <div class="card-body text-center">
        <h5 class="card-title mb-3">Ajuan Event</h5>
        <a href="https://docs.google.com/forms/d/1fbNFqFPZaU4L4XZ0qgO2kE7SggQ5tIuAJSaUFU2iNHs/edit#responses" 
           target="_blank" 
           class="btn btn-light btn-sm">
          <i class="bi bi-link-45deg"></i> Form Ajuan
        </a>
      </div>
    </div>
  </div>

  <!-- Pameran -->
  <div class="col-md-4 mb-3">
    <div class="card bg-primary text-white">
      <div class="card-body text-center">
        <h5 class="card-title mb-3">Ajuan Pameran</h5>
        <a href="https://docs.google.com/forms/d/1ZoGUihMVNBWOmf0tEluW-a0H_LonAIJiPL71_PkYP4g/edit#responses" 
           target="_blank" 
           class="btn btn-light btn-sm">
          <i class="bi bi-link-45deg"></i> Form Ajuan
        </a>
      </div>
    </div>
  </div>
</div>


</div>
@endsection
