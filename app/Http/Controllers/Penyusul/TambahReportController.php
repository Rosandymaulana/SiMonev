<?php

namespace App\Http\Controllers\Penyusul;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class TambahReportController extends Controller
{
    public function store(Request $request)
    {
        // $report1 = $request->input('realisasi');
        // $report2 = $request->input('tgl_pelaksanaan');
        // $report3 = $request->input('keterangan');

        $data = Report::create([
            'realisasi' => $request->realisasi,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'keterangan' => $request->keterangan,
        ]);

        $data->save();

        return redirect('penyusul/tabel-usulan')->with('flash_message', 'Addedd!');
    }
}
