<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratMasuk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='surat_masuk';
    protected $guarded = [];

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

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidangs');
    }

    public function disposisis()
    {
        return $this->hasMany(Disposisi::class, 'surat_masuk_id');
    }
}
