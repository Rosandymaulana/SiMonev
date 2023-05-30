<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usulan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsulanPenyusul extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);

        $usulanPenyusul = DB::table('usulan')
            ->where('kelurahan', 'Mergosono')
            ->get();

        // Tampilkan data ke view atau lakukan operasi lainnya
        return view('pages.Penyusul.progress_usulan', compact('usulanPenyusul'));

        // $usulanPenyusul = Usulan::all();

        // return view('pages.Penyusul.progress_usulan', [
        //     'title' => 'Dashboard',
        //     'usulanPenyusul' => $usulanPenyusul
        // ]);
        // return view('pages.Penyusul.progress_usulan', compact('usulanPenyusul'));
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
        $usulanPenyusul = Usulan::find($id);
        return view('pages.Penyusul.edit', [
            'usulanPenyusul' => $usulanPenyusul
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->only(['realisasi', 'tgl_pelaksanaan', 'keterangan']);

        // $usulan->update($validatedData);
        $usulanPenyusul = Usulan::find($id);
        // $input = $request->all();
        // // $id->realisasi = $request->realisasi;
        // // $id->tgl_pelaksanaan = $request->tgl_pelaksanaan;
        // // $id->keterangan = $request->keterangan;
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
