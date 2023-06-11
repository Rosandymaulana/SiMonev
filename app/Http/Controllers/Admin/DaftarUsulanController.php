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
        $reports = DB::table('report')
            ->where('status', 'submitted')
            ->orderBy('created_at', 'desc')
            ->limit(100)
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
