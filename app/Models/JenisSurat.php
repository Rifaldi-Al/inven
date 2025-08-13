<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisSurat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='jenis_surat';
    protected $dates = ['created_at'];
    protected $fillable = [
        'nama',
        'created_at',
        'deleted_at',
        'updated_at',
    ];

}
