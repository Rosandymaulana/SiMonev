<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'report';
    protected $primaryKey = 'id_report';
    protected $fillable = [
        'realisasi', 'tgl_pelaksanaan', 'keterangan', 'id_usulan', 'status', 'waktu_pelaporan', 'alasan_ditolak'
    ];

    // banyak report terkait dengan satu data_usulan
    public function dataUsulan()
    {
        return $this->hasOne(Usulan::class, 'id_usulan');
    }
}
