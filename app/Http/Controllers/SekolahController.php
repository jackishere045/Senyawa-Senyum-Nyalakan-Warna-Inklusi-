<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SekolahController extends Controller
{
    /**
     * Tampilkan halaman view sekolah (publik)
     */
    public function index()
    {
        return view('sekolah'); 
        // atau view('sekolah') kalau file-nya sekolah.blade.php di /resources/views
    }

    /**
     * API: Ambil data sekolah + filter
     */
    public function data(Request $request)
    {
        $csv = Storage::get('slb.csv'); // path benar
        $rows = array_map('str_getcsv', explode("\n", $csv));
        $header = array_shift($rows);

        $rows = array_filter($rows, fn($row) => count($row) === count($header));
        $data = array_map(fn($row) => array_combine($header, $row), $rows);

        // Filter: kabupaten
        if ($request->filled('kabupaten')) {
            $data = array_filter($data, fn($row) =>
                str_contains(strtolower($row['Kabupaten'] ?? ''), strtolower($request->kabupaten))
            );
        }

        // Filter: kecamatan
        if ($request->filled('kecamatan')) {
            $data = array_filter($data, fn($row) =>
                str_contains(strtolower($row['Kecamatan'] ?? ''), strtolower($request->kecamatan))
            );
        }

        // Filter: status
        if ($request->filled('status')) {
            $data = array_filter($data, fn($row) =>
                str_contains(strtolower($row['Status'] ?? ''), strtolower($request->status))
            );
        }

        // Kembalikan hanya kolom yang diperlukan
        $data = array_map(fn($row) => [
            'Nama' => $row['Nama Satuan Pendidikan'],
            'Status' => $row['Status'],
            'Kelurahan' => $row['Kelurahan'],
            'Kecamatan' => $row['Kecamatan'],
            'Kabupaten' => $row['Kabupaten'], 
        ], $data);

        return response()->json(array_values($data));
    }

    /**
     * API: Ambil kabupaten & kecamatan untuk filter dropdown
     */
    public function options(Request $request)
    {
        $csv = Storage::get('slb.csv');
        $rows = array_map('str_getcsv', explode("\n", $csv));
        $header = array_shift($rows);

        $rows = array_filter($rows, fn($row) => count($row) === count($header));
        $data = array_map(fn($row) => array_combine($header, $row), $rows);

        $kabupaten = collect($data)
            ->pluck('Kabupaten')
            ->unique()
            ->filter()
            ->values();

        $kecamatan = [];
        if ($request->filled('kabupaten')) {
            $kecamatan = collect($data)
                ->filter(fn($row) => $row['Kabupaten'] === $request->kabupaten)
                ->pluck('Kecamatan')
                ->unique()
                ->filter()
                ->values();
        }

        return response()->json([
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
        ]);
    }
}
