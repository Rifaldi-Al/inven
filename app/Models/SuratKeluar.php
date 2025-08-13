<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratKeluar extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='surat_keluar';
    protected $fillable = [
        'perihal',
        'tanggal',
        'tujuan',
        'file_name',
        'sifat_surat',
        'jenis_surat_id',
        'kode_surat_id',
        'created_by',
        'created_at',
        'deleted_at',
        'updated_at',
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function kodeSurat()
    {
        return $this->belongsTo(KodeSurat::class,);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function suratKeluarUsers()
    {
        return $this->hasMany(SuratKeluarUsers::class);
    }
}
