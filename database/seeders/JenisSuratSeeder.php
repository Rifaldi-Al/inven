<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data contoh ke tabel 'hal'
        DB::table('jenis_surat')->insert([
            [
                'nama' => 'Peraturan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Keputusan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Intruksi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Edaran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Dinas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Nota Dinas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Memo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Undangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Tugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Pengantar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Perjanjian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Kuasa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Keterangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Pernyataan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Surat Pengumuman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Berita Acara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}