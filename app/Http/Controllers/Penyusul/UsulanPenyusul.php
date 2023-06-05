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
        // $user = Auth::user();
        $wilayahUser = auth()->user()->wilayah->nama_wilayah;

        // $usulanPenyusul = DB::table('usulan')
        //     ->limit(100)
        //     ->get();


        // Mengambil data dari tabel usulan sesuai wilayah
        $usulanPenyusul = DB::table('usulan')
            ->join('wilayah', 'usulan.kelurahan', '=', 'wilayah.id_wilayah')
            ->where('wilayah.nama_wilayah', $wilayahUser)
            ->limit(100)
            ->get();

        // dd($usulanPenyusul);

        return view('pages.Penyusul.progress_usulan', compact('usulanPenyusul'));
    }

    public function laporkanData($id)
    {
        $usulan = Usulan::findOrFail($id);
        // dd($usulan);
        $reports = $usulan->reports;

        return view('pages.Penyusul.report-data', compact('usulan', 'reports'));
    }

    public function simpanLaporan(Request $request, $id)
    {
        $usulan = Usulan::findOrFail($id);
        $lastNumber = Report::orderBy('id_report', 'desc')->value('id_report');
        // dd($lastNumber);

        if ($lastNumber) {
            // Menghasilkan nomor baru dengan menambahkan 1 ke nomor terakhir
            $newNumber = $lastNumber + 1;
        } else {
            // Jika tidak ada nomor sebelumnya, nomor baru akan dimulai dari 1
            $newNumber = 1;
        }

        $data = [
            // 'id_report' => "5",
            'id_usulan' => $usulan->id_usulan,
            'realisasi' => $request->input('realisasi'),
            'tgl_pelaksanaan' =>  $request->input('tgl_pelaksanaan'),
            'keterangan' => $request->input('keterangan'),
        ];

        // $usulan->reports()->create([
        //     'id_usulan' => $usulan->id_usulan,
        //     'realisasi' => $request->input('realisasi'),
        //     'tgl_pelaksanaan' =>  $request->input('tgl_pelaksanaan'),
        //     'keterangan' => $request->input('keterangan'),
        // ]);

        $report = $usulan->reports()->create($data);

        return redirect('penyusul/tabel-usulan');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Penyusul.report-data');
    }

    /**
     * Store a newly created resource in storage.
     */
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
