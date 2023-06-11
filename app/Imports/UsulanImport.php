<?php

namespace App\Imports;

use App\Models\Satuan;
use App\Models\Usulan;
use App\Models\Wilayah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsulanImport implements ToModel, WithHeadingRow
{
    private $satuans;
    private $kelurahans;

    public function __construct()
    {
        $this->satuans = Satuan::select('id_satuan', 'nama_satuan')->get();
        $this->kelurahans = Wilayah::select('id_wilayah', 'nama_wilayah')->get();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        $satuan = $this->satuans->where('nama_satuan', 'LIKE', $row['satuan'])->first();
        $kelurahan = $this->kelurahans->where('nama_wilayah', 'LIKE', $row['kelurahan'])->first();

        foreach ($row as $data) {
            // Mengabaikan baris jika seluruh isian berisi NULL
            if (collect($data)->every(function ($item) {
                return $item === null;
            }) || empty($row['no'])) { // Mengabaikan baris jika column NO berisi NULL
                continue;
            }

            return new Usulan([
                'no' => $row['no'],
                'usulan_id' => $row['id_usulan'],
                'tgl_usulan' => $row['tanggal_usul'],
                'fraksi' => $row['fraksi'],
                'pengusul' => $row['pengusul'],
                'usulan' => $row['usulan'],
                'masalah' => $row['masalah'],
                'prioritas_usulan' => $row['prioritas_usulan'],
                'alamat' => $row['alamat_lokasi'],
                'kelurahan' => $kelurahan->id_wilayah ?? NULL,
                'opd_tujuan_awal' => $row['perangkat_daerah_tujuan_awal'],
                'opd_tujuan_akhir' => $row['perangkat_daerah_tujuan_akhir'],
                'status' => $row['status'],
                'volume' => $row['volume'],
                'id_satuan' => $satuan->id_satuan ?? NULL,
                'harga_satuan' => $row['harga_satuan'],
                'nilai_usulan' => $row['nilai_usulan'],
                'nilai_akomodir' => $row['nilai_akomodir'],
            ]);
        }
    }

    public function headingRow(): int
    {
        return 2;
    }
}
