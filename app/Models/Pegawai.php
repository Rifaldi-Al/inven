<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table='pegawai';
    protected $guarded = [];

    public function LogRadio(){
        return $this->hasMany(Log::class, 'id_pegawai', 'id');
    }

    public function Aset(){
        return $this->hasMany(Aset::class, 'id_pegawai', 'id');
    }

    public function Kantor() {
        return $this->belongsTo(Kantor::class, 'id_kantor', 'id'); //'foreign_key', 'other_key/primary key if the foreign is just one'
    }
}
