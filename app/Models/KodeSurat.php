<?php

namespace App\Models;

use App\Models\Hal;
use App\Models\JenisSurat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeSurat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='kode_surat';
    protected $fillable = [
        'kode_surat',
        'hal_id',
        'created_at',
        'deleted_at',
        'updated_at',
    ];

    public function Hal()
    {
        return $this->belongsTo(Hal::class);
    }

    public function suratKeluar()
    {
        return $this->hasOne(SuratKeluar::class);
    }
}
