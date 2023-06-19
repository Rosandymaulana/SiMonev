<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Penyusul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardSuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     * Ini Dashboard SuperAdmin
     * Controller untuk SuperAdmin Menampilkan rekapan data Admin dan Penyusul
     */
    public function index()
    {
        $jmlAdmin = User::whereIn('id_role', [2])->count();
        $jmlPenyusul = User::whereIn('id_role', [3])->count();

        // $wilayahCounts = Penyusul::join('wilayah', 'penyusul.id_wilayah', '=', 'wilayah.id_wilayah')
        //     ->select('wilayah.nama_wilayah', DB::raw('COUNT(penyusul.id_penyusul) as jumlah_penyusul'))
        //     ->groupBy('wilayah.nama_wilayah')
        //     ->get();

        // foreach ($wilayahCounts as $wilayahCount) {
        //     $wilayah = $wilayahCount->nama_wilayah;
        //     $jumlahPenyusul = $wilayahCount->jumlah_penyusul;

        //     echo "Wilayah: $wilayah | Jumlah Penyusul: $jumlahPenyusul <br>";
        // }

        // // $labels = $wilayahCounts->pluck('nama');
        // // $data = $wilayahCounts->pluck('jumlah_penyusul');
        // // return view('chart.index', compact('labels', 'data'));

        return view('pages.SuperAdmin.dashboard', [
            'jmlPenyusul' => $jmlPenyusul,
            'jmlAdmin' => $jmlAdmin,
            // '$labels' => $labels
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type, $id_admin, $id_penyusul)
    {
    }
}
