<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarUsulanController extends Controller
{
    public function index()
    {
        // $wilayahUser = auth()->user()->wilayah->nama_wilayah;
        $reports = DB::table('report')
            ->join('usulan', 'report.id_usulan', '=', 'usulan.id_usulan')
            ->join('wilayah', 'usulan.kelurahan', '=', 'wilayah.id_wilayah')
            ->select('report.*', 'usulan.*', 'wilayah.*')
            ->where('report.status', 'submitted')
            ->whereIn('report.created_at', function ($query) {
                $query->select(DB::raw('MAX(created_at)'))
                    ->from('report')
                    ->groupBy('id_usulan');
            })
            ->orderBy('report.created_at', 'asc')
            ->get();

        return view('pages.admin.progress-usulan', compact('reports'));
    }

    public function approveReport($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'approved';
        $report->save();

        return redirect('admin/daftar-usulan');
        // Redirect or return a response
    }

    // public function rejectReport($id)
    // {
    //     $report = Report::findOrFail($id);
    //     $report->status = 'pending';
    //     $report->save();

    //     return redirect('admin/daftar-usulan');
    //     // Redirect or return a response
    // }


}
