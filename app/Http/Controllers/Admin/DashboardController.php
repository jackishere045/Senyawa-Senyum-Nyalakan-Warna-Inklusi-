<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Event;
use App\Models\Pameran;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLowongan = Lowongan::count();
        $totalEvent = Event::count();
        $totalPameran = Pameran::count();

        // Hitung total sekolah dari CSV
        $csv = Storage::get('slb.csv');
        $rows = array_map('str_getcsv', explode("\n", $csv));
        $totalSekolah = count($rows) - 1; // kurangi header

        return view('admin.dashboard', compact(
            'totalLowongan', 'totalEvent', 'totalPameran', 'totalSekolah'
        ));
    }
}
