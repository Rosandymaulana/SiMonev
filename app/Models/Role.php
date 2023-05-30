<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'name',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->hasMany(User::class, 'id_user');
    }
}
