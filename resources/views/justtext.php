
          @foreach($lowongan as $loker)
            <div class="col-lg-4 col-md-6">
              <div class="card mb-5 mb-lg-0">
                <img src="{{ asset('assets/img/loker/' . $loker->gambar) }}" alt="Poster Lowongan Kerja" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">{{ $loker->judul }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $loker->perusahaan }}</h6>
                  <p class="card-text">{{ $loker->lokasi }}</p>
                  <a href="{{ url('lowongan/' . $loker->id) }}" class="btn btn-primary">Lamar Sekarang</a>
                </div>
              </div>
            </div>
          @endforeach

