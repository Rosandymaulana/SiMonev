<?php

namespace App\Http\Controllers;

use App\Exports\UsulanExport;
use App\Imports\UsulanImport;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     * Controller untuk Admin mengetahui seluruh data Usulan
     */
    public function index()
    {
        $usulan = Usulan::all();
        // dd($usulan);
        return view('pages.Admin.tabelUsulan', compact('usulan'));
    }

    public function usulanexport()
    {
        return Excel::download(new UsulanExport, 'TabelUsulan.xlsx');
    }

    public function usulanimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
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
