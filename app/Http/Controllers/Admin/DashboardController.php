<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usulan;
use App\Models\Report;
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
        $jumlahSelesai = DB::table('report')
            ->where('realisasi', 100)
            ->where('status', 'approved')
            ->count();

        $jmlUsulan = Usulan::count();

        $dlmProgress =
            Report::whereIn('status', ['approved'])
            ->where(function ($query) {
                $query->where('realisasi', [1, 99]);
            })
            ->where(function ($query) {
                $query->where(function ($subquery) {
                    $subquery->select('id_usulan', DB::raw('MAX(updated_at) as max_updated_at'))
                        ->from('report')
                        ->whereColumn('report.id_usulan', '=', 'id_usulan')
                        ->groupBy('id_usulan');
                });
            })
            ->count();

        $blmDimulai = DB::table('usulan')
            ->leftJoin('report', 'usulan.id_usulan', '=', 'report.id_usulan')
            ->where(function ($query) {
                $query->where(function ($subquery) {
                    $subquery->where('report.realisasi', 0)
                        ->where('report.status', 'approved');
                })->orWhereNull('report.id_report');
            })
            ->select('usulan.*')
            ->distinct()
            ->count();

        return view('pages.Admin.dashboard', [
            'jmlUsulan' => $jmlUsulan,
            'jumlahSelesai' => $jumlahSelesai,
            // 'result' => $result,
            'jmlProyekBlmDimulai' => $blmDimulai,
            // 'jmlProyekSelesai' => $jmlProyekSelesai,
            'jmlProyekDlmProgress' => $dlmProgress
        ]);
    }
}
