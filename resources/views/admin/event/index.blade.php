@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Event</h1>
    <a href="{{ route('admin.event.create') }}" class="btn btn-primary mb-3">Tambah Event</a>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 15%;">Judul</th>
                <th style="width: 15%;">Perusahaan</th>
                <th style="width: 10%;">Lokasi</th>
                <th style="width: 10%;">Tanggal</th>
                <th style="width: 15%;">Deskripsi</th>
                <th style="width: 15%;">Cara Melamar</th>
                <th style="width: 10%;">Gambar</th>
                <th style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->judul }}</td>
                <td>{{ $event->penyelenggara }}</td>
                <td>{{ $event->lokasi }}</td>
                <td>{{ $event->tanggal }}</td>
                <td>{{ Str::limit($event->deskripsi, 50) }}</td>
                <td>{{ Str::limit($event->cara_mendaftar, 50) }}</td>
                <td>
                    @if($event->gambar)
                        <img src="{{ asset('storage/'.$event->gambar) }}" width="100">
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
