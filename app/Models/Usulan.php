<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulan';
    protected $primaryKey = 'id'; //nanti diubah menjadi id_usulan
    protected $fillable = [
        'kelurahan', 'no', 'sub_kegiatan', 'usulan', 'alamat', 'opd_tujuan_akhir', 'koefisien', 'nilai_akomodir', 'realisasi', 'tgl_pelaksanaan', 'keterangan'
    ];
}
