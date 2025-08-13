<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisBidang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='jenis_bidang';
    protected $fillable = [
        'nama',
        'bidang_id'
    ];
    public function bidang()
    {
        return $this->belongsTo(bidang::class);
    }
}
