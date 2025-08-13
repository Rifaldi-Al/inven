<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aset extends Model
{
    use HasFactory;
    protected $table='aset';
    protected $fillable = [
        'id_kategori',
        'nama',
        'merk',
        'spesifikasi',
        'jumlah'
    ];
    protected $guarded = [];

    public function Pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id'); //'foreign_key', 'other_key/primary key if the foreign is just one'
    }
    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id_kategori'); //'foreign_key', 'other_key/primary key if the foreign is just one'
    }
}
