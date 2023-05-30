<?php

namespace App\Http\Controllers;

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
        $jmlUsulan = Usulan::count();

        $proyekBlmDimulai = DB::table('usulan')->where('realisasi', '=', 0)->get();
        $jmlProyekBlmDimulai = count($proyekBlmDimulai);

        $proyekSelesai = DB::table('usulan')->where('realisasi', '=', 100)->get();
        $jmlProyekSelesai = count($proyekSelesai);

        $jmlProyekDlmProgress = DB::table('usulan')
            ->whereBetween('realisasi', [2, 100])
            ->count();

        return view('pages.Admin.dashboard', [
            'jmlUsulan' => $jmlUsulan,
            'jmlProyekBlmDimulai' => $jmlProyekBlmDimulai,
            'jmlProyekSelesai' => $jmlProyekSelesai,
            'jmlProyekDlmProgress' => $jmlProyekDlmProgress
        ]);
    }
}
