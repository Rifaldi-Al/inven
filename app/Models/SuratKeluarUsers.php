<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeluarUsers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='surat_keluar_users';
    protected $fillable = [
        'surat_keluar_id',
        'users_jabatan_id',
        'status_baca',
        'status_penanda_tangan',
    ];

    public function SuratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }

    public function UserJabatan()
    {
        return $this->belongsTo(UsersJabatan::class, 'users_jabatan_id', 'id');
    }

}
