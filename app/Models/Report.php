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
        'realisasi', 'tgl_pelaksanaan', 'keterangan', 'id_usulan'
    ];

    // banyak report terkait dengan satu data_usulan
    public function dataUsulan()
    {
        return $this->belongsTo(Usulan::class, 'id_usulan');
    }
}
