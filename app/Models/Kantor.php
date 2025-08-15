<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    use HasFactory;
    protected $table='kantor';
    protected $guarded = [];

    public function Kantor(){
        return $this->hasMany(Kantor::class, 'id_kantor', 'id');
    }

    public function inventoris()
    {
        return $this->hasMany(Inventori::class, 'id_kantor', 'id');
    }


}
