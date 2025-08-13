<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table='log_radio';
    protected $guarded = [];

    public function inventori() {
        return $this->belongsTo(Inventori::class, 'id_inventori_radio', 'id'); //'foreign_key', 'other_key/primary key if the foreign is just one'
    }

    public function pegawai() {
            return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id'); //'foreign_key', 'other_key/primary key if the foreign is just one'
    }
}
