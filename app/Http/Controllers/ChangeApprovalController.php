<?php

namespace App\Http\Controllers;

use App\Models\Usulan;
use Illuminate\Http\Request;

class ChangeApprovalController extends Controller
{
    public function approveChange($id)
    {
        $data = Usulan::findOrFail($id);

        // Proses perubahan pada data sesuai dengan perubahan yang diajukan
        // Misalnya, jika ada perubahan pada kolom 'name', dapat dilakukan seperti ini:
        $data->name = $data->penyusul->new_name;

        // Set status perubahan menjadi disetujui
        $data->status = true;

        // Simpan perubahan pada data
        $data->save();

        return redirect()->back()->with('success', 'Perubahan telah disetujui dan diterapkan.');
    }
}
