<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersJabatan extends Model
{
    use HasFactory;

    protected $table='users_jabatan';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function suratMasuks()
    {
        return $this->hasMany(SuratMasuk::class, 'users_jabatan', 'id');
    }
}
