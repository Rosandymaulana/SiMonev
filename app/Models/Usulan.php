<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulan';
    protected $primaryKey = 'id_usulan';
    protected $fillable = [
        'no',
        'tgl_usulan',
        'fraksi',
        'pengusul',
        'usulan',
        'masalah',
        'prioritas_usulan',
        'alamat',
        'kelurahan',
        'opd_tujuan_awal',
        'opd_tujuan_akhir',
        'status',
        'volume',
        'id_satuan',
        'harga_satuan',
        'nilai_usulan',
        'nilai_akomodir',
        'keterangan',
        'kode_barang',
        'nama_wilayah'
    ];

    // satu data_usulan memiliki banyak report
    public function reports()
    {
        return $this->hasMany(Report::class, 'id_report');
    }

    public function satuans()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah');
    }
}
