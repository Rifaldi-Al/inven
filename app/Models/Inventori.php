<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
    use HasFactory;
    protected $table='inventori_radio';
    protected $guarded = [];

    public function LogRadio(){
        return $this->hasMany(Log::class, 'id_inventori_radio', 'id');
    }
}
