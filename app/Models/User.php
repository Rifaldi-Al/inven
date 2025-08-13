<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'kontak',
        'nip',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function suratMasuks()
    {
        return $this->hasMany(SuratMasuk::class, 'created_by');
    }

    public function jabatans()
    {
        return $this->belongsToMany(Jabatan::class, 'users_jabatan', 'users_id', 'jabatan_id');
    }

    public function jabatanActive()
    {
        $today = Carbon::today();

        return $this->hasOne(UsersJabatan::class, 'users_id', 'id')
            ->whereDate('periode_awal', '<=', $today)
            ->whereDate('periode_akhir', '>=', $today);
    }
}
