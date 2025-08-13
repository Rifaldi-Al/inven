<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Jabatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='jabatan';
    protected $fillable = [
        'kode_jabatan',
        'nama',
        'bidang_id',
        'kop_file'
    ];

    public function bidang()
    {
        return $this->belongsTo(bidang::class);
    }

    public function jabatanActive()
    {
        $today = Carbon::today();

        return $this->hasOne(UsersJabatan::class, 'jabatan_id', 'id')
            ->whereDate('periode_awal', '<=', $today)
            ->whereDate('periode_akhir', '>=', $today);
    }
}
