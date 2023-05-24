<?php

namespace App\Imports;

use App\Models\Usulan;
use Maatwebsite\Excel\Concerns\ToModel;

class UsulanImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Usulan([
            'kelurahan' => $row[1],
            'no' => $row[2],
            'sub_kegiatan' => $row[3],
            'usulan' => $row[4],
            'alamat' => $row[5],
            'opd_tujuan_akhir' => $row[6],
            'koefisien' => $row[7],
            'nilai_akomodir' => $row[8],
            'realisasi' => $row[9],
            'tgl_pelaksanaan' => $row[10],
            'keterangan' => $row[11]
        ]);
    }
}
