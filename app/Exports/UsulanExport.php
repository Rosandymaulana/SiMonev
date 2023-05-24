<?php

namespace App\Exports;

use App\Models\Usulan;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsulanExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Usulan::select('kelurahan', 'no', 'sub_kegiatan', 'usulan', 'alamat', 'opd_tujuan_akhir', 'koefisien', 'nilai_akomodir', 'realisasi', 'tgl_pelaksanaan', 'keterangan')->get();
        return $data;
    }
}
