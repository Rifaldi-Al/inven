<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table='laporan';
    protected $guarded = [];

    public function detailaset() {
        return $this->belongsTo(DetailAset::class, 'id_detail', 'id');
    }
}
