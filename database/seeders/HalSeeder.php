<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hal;
use Illuminate\Support\Facades\DB;

class HalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data contoh ke tabel 'hal'
        DB::table('hal')->insert([
            [
                'nama' => 'Bantuan Pendidikan',
                'kode_hal' => 'BP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Evaluasi Pendidikan',
                'kode_hal' => 'EP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Hubungan Masyarakat',
                'kode_hal' => 'HM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Hukum',
                'kode_hal' => 'HK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kebahasan',
                'kode_hal' => 'BS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kebudayaan',
                'kode_hal' => 'KB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kemahasiswaan',
                'kode_hal' => 'KM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kepegawaian',
                'kode_hal' => 'KP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kerja Sama',
                'kode_hal' => 'KS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'KerumahTanggaan',
                'kode_hal' => 'RT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ketatausahaan',
                'kode_hal' => 'TU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Keuangan',
                'kode_hal' => 'KU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kurikulum',
                'kode_hal' => 'KR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Organisasi dan Tatalaksana',
                'kode_hal' => 'OT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pendidikan Masyarakat',
                'kode_hal' => 'PM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pendidikan dan Pelathian',
                'kode_hal' => 'PP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pendidik dan Tenaga Pendidikan',
                'kode_hal' => 'PT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Penelitian dan Pengembangan',
                'kode_hal' => 'PG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengabdian kepada Masyarakat',
                'kode_hal' => 'AM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengawasan',
                'kode_hal' => 'WS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Penjaminan Mutu',
                'kode_hal' => 'PJ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Perbukuan',
                'kode_hal' => 'PB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Perencanaan dan Penganggaran',
                'kode_hal' => 'PR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Perlengkapan',
                'kode_hal' => 'LK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Perfilman',
                'kode_hal' => 'PF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Peserta Didik',
                'kode_hal' => 'PD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Publikasi Ilmiah',
                'kode_hal' => 'PI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sarana dan Prasarana Pendidikan',
                'kode_hal' => 'SP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Terknologi Informasi dan Komunikasi',
                'kode_hal' => 'TI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
 