<?php

namespace App\Http\Controllers\Penyusul;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPenyusul extends Controller
{
    public function index()
    {
        $wilayahUser = auth()->user()->wilayah->nama_wilayah;

        $jmlhUsulanPerWilayah = DB::table('usulan')
            ->join('wilayah', 'usulan.kelurahan', '=', 'wilayah.id_wilayah')
            ->where('wilayah.nama_wilayah', $wilayahUser)
            ->limit(100)
            ->count();
        // ->get();

        $dlmProgress = DB::table('report')
            ->whereBetween('realisasi', [1, 99])
            ->where('status', 'approved')
            ->count();

        $jumlahSelesai = DB::table('report')
            ->where('realisasi', 100)
            ->where('status', 'approved')
            ->count();

        return view('pages.penyusul.dashboard', compact('jmlhUsulanPerWilayah', 'dlmProgress', 'jumlahSelesai'));
    }
}
