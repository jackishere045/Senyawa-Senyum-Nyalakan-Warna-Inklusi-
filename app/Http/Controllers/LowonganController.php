<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Tampilkan daftar lowongan untuk pengunjung (publik)
     */
    public function index()
    {
        $lowongan = Lowongan::all();
        return view('lowongan', compact('lowongan'));
    }

    /**
     * Tampilkan daftar lowongan untuk admin
     */
    public function adminIndex()
    {
        $lowongan = Lowongan::all();
        return view('admin.lowongan.index', compact('lowongan'));
    }

    /**
     * Form tambah lowongan (admin)
     */
    public function create()
    {
        return view('admin.lowongan.create');
    }

    /**
     * Simpan data lowongan baru (admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'perusahaan' => 'required',
            'lokasi' => 'required',
            'gambar' => 'nullable|image',
            'deskripsi' => 'nullable',
            'cara_melamar' => 'nullable',
        ]);

        $data = $request->only('judul', 'perusahaan', 'lokasi', 'deskripsi', 'cara_melamar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('loker', 'public');
        }

        Lowongan::create($data);

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    /**
     * Form edit lowongan (admin)
     */
    public function edit(Lowongan $lowongan)
    {
        return view('admin.lowongan.edit', compact('lowongan'));
    }

    /**
     * Update data lowongan (admin)
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'judul' => 'required',
            'perusahaan' => 'required',
            'lokasi' => 'required',
            'gambar' => 'nullable|image',
            'deskripsi' => 'nullable',
            'cara_melamar' => 'nullable',
        ]);

        $data = $request->only('judul', 'perusahaan', 'lokasi', 'deskripsi', 'cara_melamar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('loker', 'public');
        }

        $lowongan->update($data);

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diupdate!');
    }

    /**
     * Hapus lowongan (admin)
     */
    public function destroy(Lowongan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus!');
    }

    public function show(Lowongan $lowongan)
    {
        return view('lowongan.show', compact('lowongan'));
    }
}
