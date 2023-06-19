<?php

namespace App\Http\Controllers\Penyusul;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usulan;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;

class UsulanPenyusul extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayahUser = auth()->user()->wilayah->nama_wilayah;

        // Mengambil data dari tabel usulan sesuai wilayah
        // $usulanPenyusul = DB::table('usulan')
        //     ->join('wilayah', 'usulan.kelurahan', '=', 'wilayah.id_wilayah')
        //     ->where('wilayah.nama_wilayah', $wilayahUser)
        //     ->limit(100)
        //     ->get();

        // Paten Terbaru
        $usulanPenyusul = DB::table('usulan')
            ->join(
                'wilayah',
                'usulan.kelurahan',
                '=',
                'wilayah.id_wilayah'
            )
            ->leftJoin('report', function ($join) {
                $join->on('report.id_usulan', '=', 'usulan.id_usulan')
                    ->where('report.status', '=', 'approved')
                    ->whereRaw('report.updated_at = (SELECT MAX(updated_at) FROM report WHERE id_usulan = usulan.id_usulan AND status = "approved")');
            })
            ->where('wilayah.nama_wilayah', $wilayahUser)
            ->select('usulan.*', 'report.realisasi')
            ->orderBy('usulan.no', 'asc')
            ->get();

        // Paten
        // $usulanPenyusul = DB::table('usulan')
        //     ->join(
        //         'wilayah',
        //         'usulan.kelurahan',
        //         '=',
        //         'wilayah.id_wilayah'
        //     )
        //     ->leftJoin('report', function ($join) {
        //         $join->on('report.id_usulan', '=', 'usulan.id_usulan')
        //             ->where(
        //                 'report.status',
        //                 '=',
        //                 'approved'
        //             )
        //             ->whereRaw('report.updated_at = (SELECT MAX(updated_at) FROM report WHERE id_usulan = usulan.id_usulan)');
        //     })
        //     ->where('wilayah.nama_wilayah', $wilayahUser)
        //     ->select('usulan.*', 'report.realisasi')
        //     ->orderBy('usulan.no', 'asc')
        //     ->get();

        // dd($usulanPenyusul);

        return view('pages.Penyusul.progress_usulan', compact('usulanPenyusul',));
    }


    public function laporkanData($id)
    {
        $usulan = Usulan::findOrFail($id);
        $namaWilayah = $usulan->wilayah ? $usulan->wilayah->nama_wilayah : 'belum ada';
        // $report = Report::where('id_usulan', $usulan->id_usulan)->first();
        // dd($usulan);
        // if ($report) {
        //     return redirect()->back()->with('error', 'Tidak dapat mengedit usulan. Terdapat report dalam proses persetujuan Admin.');
        // }
        // dd($usulan);

        // $selectedID = $usulan->id_usulan;
        $selectedID = $usulan->id_usulan;

        $latestDate = DB::table('report')
            ->where('id_usulan', $selectedID)
            ->max('updated_at');

        // Paten Jangan Dirubah
        $latestReports = DB::table('report')
            ->join('usulan', 'report.id_usulan', '=', 'usulan.id_usulan')
            ->where('report.id_usulan', $selectedID)
            ->where('report.status', 'approved')
            ->where('report.updated_at', function ($query) use ($selectedID) {
                $query->select(DB::raw('MAX(updated_at)'))
                    ->from('report')
                    ->where('id_usulan', $selectedID)
                    ->where('status', 'approved');
            })
            ->select('report.*')
            ->latest('report.updated_at')
            ->first();


        // $latestReports = DB::table('report')
        //     ->join('usulan', 'report.id_usulan', '=', 'usulan.id_usulan')
        //     ->select('report.*')
        //     ->where('usulan.id_usulan', $selectedID)
        //     ->where('report.status', 'approved')
        //     ->whereRaw('report.updated_at = (SELECT MAX(updated_at) FROM report WHERE id_usulan = report.id_usulan)')
        //     ->latest('report.updated_at')
        //     ->first();



        // $latestReports = DB::table('report')
        //     ->join('usulan', 'report.id_usulan', '=', 'usulan.id_usulan')
        //     ->select('report.*')
        //     ->where('report.status', 'approved')
        //     ->where('report.id_usulan', $selectedID)
        //     ->where(function ($query) use ($selectedID) {
        //         $query->where('report.status', 'approved')
        //             ->whereDate('report.updated_at', '=', DB::raw("(SELECT MAX(updated_at) FROM report WHERE id_usulan = $selectedID)"));
        //         ->whereRaw('report.updated_at = (SELECT MAX(updated_at) FROM report WHERE id_usulan = report.id_usulan)');
        //     })
        //     ->latest('report.updated_at')
        //     ->first();

        // dd($selectedID, $latestDate, $latestReports);

        $dataReports = Report::where('id_usulan', $id)->get();

        return view('pages.Penyusul.report-data', compact('usulan', 'dataReports', 'latestReports', 'namaWilayah'));
    }

    public function simpanLaporan(Request $request, $id)
    {
        $usulan = Usulan::findOrFail($id);

        // $lastNumber = Report::orderBy('id_report', 'desc')->value('id_report');
        // // dd($lastNumber);

        // if ($lastNumber) {
        //     // Menghasilkan nomor baru dengan menambahkan 1 ke nomor terakhir
        //     $newNumber = $lastNumber + 1;

        //     $data = [
        //         'id_report' => $newNumber,
        //         'id_usulan' => $usulan->id_usulan,
        //         'realisasi' => $request->input('realisasi'),
        //         'tgl_pelaksanaan' =>  $request->input('tgl_pelaksanaan'),
        //         'keterangan' => $request->input('keterangan'),
        //     ];
        // } else {
        //     // Jika tidak ada nomor sebelumnya, nomor baru akan dimulai dari 1
        //     $newNumber = 1;
        // }


        $data = [
            'id_usulan' => $usulan->id_usulan,
            'realisasi' => $request->input('realisasi'),
            'tgl_pelaksanaan' =>  $request->input('tgl_pelaksanaan'),
            'keterangan' => $request->input('keterangan'),
            'waktu_pelaporan' => $request->input('waktu_pelaporan'),
        ];

        if ($request->status == 'pending') {
            $data['status'] = 'pending';
        } elseif ($request->status == 'submitted') {
            $data['status'] = 'submitted';
        }

        // $usulan->reports()->create([
        //     'id_usulan' => $usulan->id_usulan,
        //     'realisasi' => $request->input('realisasi'),
        //     'tgl_pelaksanaan' =>  $request->input('tgl_pelaksanaan'),
        //     'keterangan' => $request->input('keterangan'),
        // ]);

        $usulan->reports()->create($data);

        return redirect('penyusul/tabel-usulan/' . $usulan->id_usulan . '/laporkan-data');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $usulan = Usulan::findOrFail($id);
        $dataReports = Report::where('id_usulan', $id)->get();

        return view('pages.Penyusul.report-data', compact('usulan', 'dataReports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // $report1 = $request->input('realisasi');
        // $report2 = $request->input('tgl_pelaksanaan');
        // $report3 = $request->input('keterangan');

        // $data = Report::create([
        //     'realisasi' => $request->realisasi,
        //     'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
        //     'keterangan' => $request->keterangan,
        // ]);

        // $data->save();

        return redirect(`penyusul/tabel-usulan/$id/laporkan-data`)->with('flash_message', 'Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataUsulan = Usulan::findOrFail($id);

        $report = DB::table('report')
            ->where('id_usulan', $dataUsulan->id_usulan)
            ->orderBy('realisasi', 'asc')
            ->get();

        // dd($report);

        return view('pages.penyusul.detail-data', [
            'report' => $report,
            'dataUsulan' => $dataUsulan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usulanPenyusul = Usulan::find($id);
        $report = $usulanPenyusul->reports()->limit(3)->get();

        return view('pages.penyusul.edit', compact('usulanPenyusul', 'report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->only(['realisasi', 'tgl_pelaksanaan', 'keterangan']);

        // $usulan->update($validatedData);
        $usulanPenyusul = Usulan::find($id);
        $usulanPenyusul->update($validatedData);


        // return redirect()->back()->with('success', 'Data Usulan Berhasil Di Update');
        return redirect('/penyusul/tabel-usulan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
