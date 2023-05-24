<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
