<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wilayah;
use App\Models\Users;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $hidden = [
        'password',
    ];
    protected $fillable = [
        'username', 'email', 'no_telp', 'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
