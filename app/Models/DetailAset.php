<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAset extends Model
{
    use HasFactory;
    protected $table='detail_aset';
    protected $guarded = [];

    public function aset() {
        return $this->belongsTo(Aset::class, 'id_aset', 'id');
    }
    public function Pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai'); //'foreign_key', 'other_key/primary key if the foreign is just one'
    }
}
