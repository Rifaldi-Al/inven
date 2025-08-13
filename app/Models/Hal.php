<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='hal';
    protected $fillable = [
        'nama',
        'kode_hal',
        'created_at',
        'deleted_at',
        'updated_at',
    ];
}
