<?php

namespace App\Http\Controllers\Penyusul;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusUsulanController extends Controller
{
    public function index()
    {
        $reports = DB::table('report')
            ->limit(100)
            ->get();

        // return view('pages.admin.progress-usulan', compact('reports'));
        return view('pages.Penyusul.status-usulan', compact('reports'));
    }

    public function edit(string $id)
    {
        $dataReports = Report::findOrFail($id);

        return view('pages.penyusul.edit-progress', compact('dataReports'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->only(['realisasi', 'tgl_pelaksanaan', 'keterangan']);

        // $usulan->update($validatedData);
        $usulanPenyusul = Report::find($id);
        $usulanPenyusul->update($validatedData);


        // return redirect()->back()->with('success', 'Data Usulan Berhasil Di Update');
        return redirect('/penyusul/status-usulan');
    }

    public function destroy($product_ID)
    {
        $hapus = Report::findorfail($product_ID);

        $hapus->delete();
        // Product::destroy($product_ID);
        // Storage::delete($product_ID->image);

        return redirect('/penyusul/status-usulan');
    }
}
