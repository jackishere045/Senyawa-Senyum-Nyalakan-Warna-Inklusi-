@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Sekolah PLB</h1>

    <div class="card mb-4 p-3">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="kabupaten">Kabupaten:</label>
                <select id="kabupaten" class="form-select">
                    <option value="">-- Pilih Kabupaten --</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="kecamatan">Kecamatan:</label>
                <select id="kecamatan" class="form-select" disabled>
                    <option value="">-- Pilih Kecamatan --</option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button id="filterBtn" class="btn btn-primary w-100">Tampilkan Sekolah</button>
            </div>
        </div>
    </div>

    <!-- Spinner Loading -->
    <div id="loading" class="alert alert-info" style="display: none;">
        Loading data sekolah...
    </div>

    <div class="table-responsive">
        <table id="resultTable" class="table table-bordered table-striped table-hover"></table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
const kabupatenSelect = document.getElementById('kabupaten');
const kecamatanSelect = document.getElementById('kecamatan');
const loading = document.getElementById('loading');
const table = document.getElementById('resultTable');

// Ambil kabupaten di awal
axios.get('/api/sekolah/options')
    .then(res => {
        res.data.kabupaten.forEach(kab => {
            const opt = document.createElement('option');
            opt.value = kab;
            opt.textContent = kab;
            kabupatenSelect.appendChild(opt);
        });
    });

// Ambil kecamatan saat kabupaten dipilih
kabupatenSelect.addEventListener('change', function() {
    const selectedKab = this.value;
    kecamatanSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
    kecamatanSelect.disabled = true;

    if (selectedKab) {
        axios.get('/api/sekolah/options', {
            params: { kabupaten: selectedKab }
        })
        .then(res => {
            res.data.kecamatan.forEach(kec => {
                const opt = document.createElement('option');
                opt.value = kec;
                opt.textContent = kec;
                kecamatanSelect.appendChild(opt);
            });
            kecamatanSelect.disabled = false;
        });
    }
});

// Fungsi render table
function renderTable(rows) {
    table.innerHTML = '';

    if (rows.length > 0) {
        const headerRow = document.createElement('tr');
        Object.keys(rows[0]).forEach(col => {
            if (col !== 'Deskripsi') { // HANYA skip Deskripsi
                const th = document.createElement('th');
                th.textContent = col;
                headerRow.appendChild(th);
            }
        });
        table.appendChild(headerRow);

        rows.forEach(row => {
            const tr = document.createElement('tr');
            Object.entries(row).forEach(([key, val]) => {
                if (key !== 'Deskripsi') {
                    const td = document.createElement('td');
                    td.textContent = val;
                    tr.appendChild(td);
                }
            });
            table.appendChild(tr);
        });
    } else {
        const emptyRow = document.createElement('tr');
        const td = document.createElement('td');
        td.colSpan = 5; // Sesuaikan jumlah kolom
        td.className = 'text-center';
        td.textContent = 'Tidak ada data ditemukan.';
        emptyRow.appendChild(td);
        table.appendChild(emptyRow);
    }
}

// Tombol filter
document.getElementById('filterBtn').onclick = function() {
    const kabupaten = kabupatenSelect.value;
    const kecamatan = kecamatanSelect.value;

    loading.style.display = 'block';

    axios.get('/api/sekolah', {
        params: {
            kabupaten: kabupaten,
            kecamatan: kecamatan
        }
    }).then(res => {
        loading.style.display = 'none';
        renderTable(res.data);
    });
};

// Load data semua sekolah di awal
window.addEventListener('DOMContentLoaded', function() {
    loading.style.display = 'block';
    axios.get('/api/sekolah')
        .then(res => {
            loading.style.display = 'none';
            renderTable(res.data);
        });
});
</script>

@endsection
