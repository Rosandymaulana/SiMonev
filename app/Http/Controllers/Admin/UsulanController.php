<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\UsulanExport;
use App\Imports\UsulanImport;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     * Controller untuk Admin mengetahui seluruh data Usulan
     */
    public function index()
    {
        $usulan = DB::table('usulan')
            ->limit(100)
            ->get();

        // $usulan = Usulan::all();
        $namaSatuan = DB::table('usulan')
            ->join('satuan', 'usulan.id_satuan', '=', 'satuan.id_satuan')
            ->select('usulan.*', 'satuan.nama_satuan AS nama_satuan')
            ->limit(500)
            ->get();

        // $usulanWithSatuan = [];
        // foreach ($usulan as $item) {
        //     $usulanWithSatuan[] = [
        //         'id_usulan' => $item->id_usulan,
        //         'tgl_usulan' => $item->tgl_usulan,
        //         'fraksi' => $item->fraksi,
        //         'pengusul' => $item->pengusul,
        //         'usulan' => $item->usulan,
        //         'masalah' => $item->masalah,
        //         'prioritas_usulan' => $item->prioritas_usulan,
        //         'alamat' => $item->alamat,
        //         'kelurahan' => $item->kelurahan,
        //         'opd_tujuan_awal' => $item->opd_tujuan_awal,
        //         'opd_tujuan_akhir' => $item->opd_tujuan_akhir,
        //         'status' => $item->status,
        //         'volume' => $item->volume,
        //         'nama_satuan' => null,
        //         'harga_satuan' => $item->harga_satuan,
        //         'nilai_usulan' => $item->nilai_usulan,
        //         'nilai_akomodir' => $item->nilai_akomodir,
        //     ];
        // }

        // foreach ($usulanWithSatuan as $key => $item) {
        //     foreach ($namaSatuan as $satuan) {
        //         if ($item['id_usulan'] == $satuan->id_usulan) {
        //             $usulanWithSatuan[$key]['nama_satuan'] = $satuan->nama_satuan;
        //             break;
        //         }
        //     }
        // }

        return view('pages.Admin.tabelUsulan', compact('usulan', 'namaSatuan'));
    }

    public function usulanexport()
    {
        return Excel::download(new UsulanExport, 'TabelUsulan.xlsx');
    }

    public function usulanimport(Request $request)
    {
        $file = $request->file('file');
        // $namaFile = $file->getClientOriginalName();

        // menghindari Script yg dimasukkan oleh hacker
        $namaFile = $file->hashName();
        $file->move('TabelUsulan', $namaFile);

        Excel::import(new UsulanImport, public_path('/TabelUsulan/' . $namaFile));
        return redirect('/admin/tabel-usulan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $detail = Usulan::find($id);
        // dd($data);
        return view('pages.admin.detail-data', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $usulan = Usulan::find($id);
        // return view('pages.Admin.edit', [
        //     'usulan' => $usulan
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $validatedData = $request->only(['realisasi', 'tgl_pelaksanaan', 'keterangan']);
        // $usulan = Usulan::find($id);
        // $usulan->update($validatedData);
        // return redirect('tabel_usulan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
