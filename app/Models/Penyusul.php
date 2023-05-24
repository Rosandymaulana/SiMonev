<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Wilayah;

class Penyusul extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'penyusul';
    protected $primaryKey = 'id_penyusul';
    // protected $hidden = [
    //     'password',
    // ];
    // protected $fillable = [
    //     'username', 'password', 'email', 'name', 'jabatan', 'no_telp', 'foto'
    // ];

    protected $fillable = [
        'username', 'password', 'email'
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah');
    }
}
