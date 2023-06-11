<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     ** Controller untuk Admin Menampilkan rekapan data Usulan
     */
    public function index()
    {
        $result = DB::table('usulan')
            ->select(DB::raw('COUNT(*) as total'))
            ->whereNull('tgl_usulan')
            ->orWhereNull('fraksi')
            ->orWhereNull('pengusul')
            ->orWhereNull('usulan')
            ->orWhereNull('masalah')
            ->orWhereNull('prioritas_usulan')
            ->orWhereNull('alamat')
            ->orWhereNull('kelurahan')
            ->orWhereNull('opd_tujuan_awal')
            ->orWhereNull('opd_tujuan_akhir')
            ->orWhereNull('status')
            ->orWhereNull('volume')
            ->orWhereNull('id_satuan')
            ->orWhereNull('harga_satuan')
            ->orWhereNull('nilai_usulan')
            ->orWhereNull('nilai_akomodir')
            ->get();

        $jmlUsulan = Usulan::count();

        // $proyekBlmDimulai = DB::table('usulan')->where('realisasi', '=', 0)->get();
        // $jmlProyekBlmDimulai = count($proyekBlmDimulai);

        // $proyekSelesai = DB::table('usulan')->where('realisasi', '=', 100)->get();
        // $jmlProyekSelesai = count($proyekSelesai);

        // $jmlProyekDlmProgress = DB::table('usulan')
        //     ->whereBetween('realisasi', [2, 100])
        //     ->count(); 

        return view('pages.Admin.dashboard', [
            'jmlUsulan' => $jmlUsulan,
            // 'result' => $result,
            // 'jmlProyekBlmDimulai' => $jmlProyekBlmDimulai,
            // 'jmlProyekSelesai' => $jmlProyekSelesai,
            // 'jmlProyekDlmProgress' => $jmlProyekDlmProgress
        ]);
    }
}
