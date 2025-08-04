<?php

namespace App\Http\Controllers;

use App\Models\Pameran;
use Illuminate\Http\Request;

class PameranController extends Controller
{
    // Halaman publik daftar pameran
    public function index()
    {
        $pameran = Pameran::all();
        return view('pameran', compact('pameran'));
    }

    // Halaman detail pameran
    public function show(Pameran $pameran)
    {
        return view('pameran.show', compact('pameran'));
    }

    // Admin index
    public function adminIndex()
    {
        $pameran = Pameran::all();
        return view('admin.pameran.index', compact('pameran'));
    }

    // Admin create
    public function create()
    {
        return view('admin.pameran.create');
    }

    // Admin store
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'nama_pemilik' => 'required',
            'asal_pemilik' => 'required',
            'deskripsi_karya' => 'nullable',
            'gambar' => 'nullable|image'
        ]);

        $data = $request->only(['judul', 'nama_pemilik', 'asal_pemilik', 'deskripsi_karya']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pameran', 'public');
        }

        Pameran::create($data);

        return redirect()->route('admin.pameran.index')->with('success', 'Pameran berhasil ditambahkan!');
    }

    // Admin edit
    public function edit(Pameran $pameran)
    {
        return view('admin.pameran.edit', compact('pameran'));
    }

    // Admin update
    public function update(Request $request, Pameran $pameran)
    {
        $request->validate([
            'judul' => 'required',
            'nama_pemilik' => 'required',
            'asal_pemilik' => 'required',
            'deskripsi_karya' => 'nullable',
            'gambar' => 'nullable|image'
        ]);

        $data = $request->only(['judul', 'nama_pemilik', 'asal_pemilik', 'deskripsi_karya']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pameran', 'public');
        }

        $pameran->update($data);

        return redirect()->route('admin.pameran.index')->with('success', 'Pameran berhasil diupdate!');
    }

    // Admin delete
    public function destroy(Pameran $pameran)
    {
        $pameran->delete();
        return redirect()->route('admin.pameran.index')->with('success', 'Pameran berhasil dihapus!');
    }
}
