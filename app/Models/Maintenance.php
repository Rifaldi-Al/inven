<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenance';

    protected $fillable = [
        'id_detail',
        'tanggal_laporan',
        'status',
        'keterangan',
        'tanggal_perbaikan',
        'id_pegawai',
    ];

    public function detailaset() {
        return $this->belongsTo(DetailAset::class, 'id_detail', 'id');
    }
    public function Pegawai() {
        return $this->belongsTo(User::class, 'id_pegawai', 'id');
    }
}
