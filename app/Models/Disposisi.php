<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disposisi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='disposisi';
    protected $guarded = [];

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id');
    }

    public function userJabatan()
    {
        return $this->belongsTo(UsersJabatan::class, 'users_jabatan');
    }

    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
