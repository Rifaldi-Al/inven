<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create( [
            'id'=>34,
            'kode_jabatan'=>'PL21',
            'nama'=>'Direktur',
            'kop_file'=>NULL,
            'bidang_id'=>4,
            'created_at'=>'2024-05-27 23:49:23',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:49:23',
            'jabatan_id'=>NULL,
            'left'=>1,
            'right'=>96
            ] );
                        
            Jabatan::create( [
            'id'=>35,
            'kode_jabatan'=>'PL21',
            'nama'=>'Wakil Direktur 1',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-27 23:49:56',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:49:56',
            'jabatan_id'=>34,
            'left'=>2,
            'right'=>85
            ] );
                        
            Jabatan::create( [
            'id'=>36,
            'kode_jabatan'=>'PL21',
            'nama'=>'Wakil Direktur 2',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-27 23:50:36',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:50:36',
            'jabatan_id'=>34,
            'left'=>86,
            'right'=>93
            ] );
                        
            Jabatan::create( [
            'id'=>37,
            'kode_jabatan'=>'PL21',
            'nama'=>'Wakil Direktur 3',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-27 23:50:52',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:50:52',
            'jabatan_id'=>34,
            'left'=>94,
            'right'=>95
            ] );
                        
            Jabatan::create( [
            'id'=>38,
            'kode_jabatan'=>'PL21.1',
            'nama'=>'Kepala Bagian Akademik, Kemahasiswaan, dan Kerja Sama',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-27 23:51:39',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:51:39',
            'jabatan_id'=>35,
            'left'=>3,
            'right'=>4
            ] );
                        
            Jabatan::create( [
            'id'=>39,
            'kode_jabatan'=>'PL21.A',
            'nama'=>'Ketua Jurusan Lingkungan dan Kehutanan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-27 23:52:39',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:52:39',
            'jabatan_id'=>35,
            'left'=>5,
            'right'=>38
            ] );
                        
            Jabatan::create( [
            'id'=>40,
            'kode_jabatan'=>'PL21.A1',
            'nama'=>'Ketua Prodi Pengelolaan Hasil Hutan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-27 23:57:25',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:57:25',
            'jabatan_id'=>39,
            'left'=>6,
            'right'=>15
            ] );
                        
            Jabatan::create( [
            'id'=>41,
            'kode_jabatan'=>'PL21.A2',
            'nama'=>'Ketua Prodi Pengelolaan Hutan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-27 23:58:23',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-27 23:58:23',
            'jabatan_id'=>39,
            'left'=>16,
            'right'=>31
            ] );
                        
            Jabatan::create( [
            'id'=>42,
            'kode_jabatan'=>'PL21.B',
            'nama'=>'Ketua Jurusan Pertanian',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:05:44',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:05:44',
            'jabatan_id'=>35,
            'left'=>39,
            'right'=>62
            ] );
                        
            Jabatan::create( [
            'id'=>43,
            'kode_jabatan'=>'PL21.C',
            'nama'=>'Ketua Jurusan Rekayasa dan Komputer',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:06:13',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:06:13',
            'jabatan_id'=>35,
            'left'=>63,
            'right'=>84
            ] );
                        
            Jabatan::create( [
            'id'=>44,
            'kode_jabatan'=>'PL21.A3',
            'nama'=>'Ketua Prodi Pengelolaan Lingkungan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:08:46',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:08:46',
            'jabatan_id'=>39,
            'left'=>32,
            'right'=>37
            ] );
                        
            Jabatan::create( [
            'id'=>45,
            'kode_jabatan'=>'PL21.A4',
            'nama'=>'Ketua Prodi Rekayasa Kayu',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:10:09',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:10:09',
            'jabatan_id'=>43,
            'left'=>64,
            'right'=>65
            ] );
                        
            Jabatan::create( [
            'id'=>46,
            'kode_jabatan'=>'PL21.B1',
            'nama'=>'Ketua Prodi Budidaya Tanaman Perkebunan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:12:35',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:12:35',
            'jabatan_id'=>42,
            'left'=>40,
            'right'=>45
            ] );
                        
            Jabatan::create( [
            'id'=>47,
            'kode_jabatan'=>'PL21.B2',
            'nama'=>'Ketua Prodi Teknologi Hasil Perkebunan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:13:52',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:13:52',
            'jabatan_id'=>42,
            'left'=>46,
            'right'=>55
            ] );
                        
            Jabatan::create( [
            'id'=>48,
            'kode_jabatan'=>'PL21.B3',
            'nama'=>'Ketua Prodi Pengelolaan Perkebunan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:14:55',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:14:55',
            'jabatan_id'=>42,
            'left'=>56,
            'right'=>59
            ] );
                        
            Jabatan::create( [
            'id'=>49,
            'kode_jabatan'=>'PL21.B4',
            'nama'=>'Ketua Prodi Teknologi Produksi Tanaman Pangan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:16:53',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:21:29',
            'jabatan_id'=>42,
            'left'=>60,
            'right'=>61
            ] );
                        
            Jabatan::create( [
            'id'=>50,
            'kode_jabatan'=>'PL21.C1',
            'nama'=>'Ketua Prodi Teknologi Rekayasa Prangkat Lunak',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:20:02',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:20:02',
            'jabatan_id'=>43,
            'left'=>66,
            'right'=>71
            ] );
                        
            Jabatan::create( [
            'id'=>51,
            'kode_jabatan'=>'PL21.C2',
            'nama'=>'Ketua Prodi Teknologi Geomatika',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:23:53',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:23:53',
            'jabatan_id'=>43,
            'left'=>72,
            'right'=>79
            ] );
                        
            Jabatan::create( [
            'id'=>52,
            'kode_jabatan'=>'PL21.C3',
            'nama'=>'Ketua Prodi Teknologi Rekayasa Geomatika dan Survei',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:25:09',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:40:50',
            'jabatan_id'=>43,
            'left'=>82,
            'right'=>83
            ] );
                        
            Jabatan::create( [
            'id'=>53,
            'kode_jabatan'=>'PL21.C4',
            'nama'=>'Ketua Prodi Sistem Informasi Akuntansi',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:25:55',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:25:55',
            'jabatan_id'=>43,
            'left'=>80,
            'right'=>81
            ] );
                        
            Jabatan::create( [
            'id'=>54,
            'kode_jabatan'=>'PL21.C1-2',
            'nama'=>'Kepala Lab. Jaringan Komputer',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:30:04',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:18:39',
            'jabatan_id'=>50,
            'left'=>67,
            'right'=>68
            ] );
                        
            Jabatan::create( [
            'id'=>55,
            'kode_jabatan'=>'PL21.C1-1',
            'nama'=>'Kepala Lab. Rekayasa Perangkat Lunak',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 00:31:28',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:20:11',
            'jabatan_id'=>50,
            'left'=>69,
            'right'=>70
            ] );
                        
            Jabatan::create( [
            'id'=>56,
            'kode_jabatan'=>'PL21.2',
            'nama'=>'Kepala Bagian Perencanaan, Keuangan, dan Umum',
            'kop_file'=>NULL,
            'bidang_id'=>2,
            'created_at'=>'2024-05-28 00:32:46',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:32:46',
            'jabatan_id'=>36,
            'left'=>87,
            'right'=>88
            ] );
                        
            Jabatan::create( [
            'id'=>57,
            'kode_jabatan'=>'PL21.2',
            'nama'=>'Kepala Bagian Perencanaan, Keuangan, dan Umum',
            'kop_file'=>NULL,
            'bidang_id'=>2,
            'created_at'=>'2024-05-28 00:40:08',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:40:08',
            'jabatan_id'=>36,
            'left'=>89,
            'right'=>90
            ] );
                        
            Jabatan::create( [
            'id'=>58,
            'kode_jabatan'=>'PL21.2',
            'nama'=>'Kepala Bagian Perencanaan, Keuangan, dan Umum',
            'kop_file'=>NULL,
            'bidang_id'=>2,
            'created_at'=>'2024-05-28 00:43:46',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 00:43:46',
            'jabatan_id'=>36,
            'left'=>91,
            'right'=>92
            ] );
                        
            Jabatan::create( [
            'id'=>59,
            'kode_jabatan'=>'PL21.A1-3',
            'nama'=>'Kepala Lab. Hasil Hutan Non Kayu',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:04:27',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:15:17',
            'jabatan_id'=>40,
            'left'=>7,
            'right'=>8
            ] );
                        
            Jabatan::create( [
            'id'=>60,
            'kode_jabatan'=>'PL21.A1-2',
            'nama'=>'Kepala Lab. Keteknikan Hutan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:10:13',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:15:50',
            'jabatan_id'=>40,
            'left'=>9,
            'right'=>10
            ] );
                        
            Jabatan::create( [
            'id'=>61,
            'kode_jabatan'=>'PL21.A1-4',
            'nama'=>'Kepala Lab. Rekayasa Pengolahan Kayu',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:11:21',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:16:25',
            'jabatan_id'=>40,
            'left'=>11,
            'right'=>12
            ] );
                        
            Jabatan::create( [
            'id'=>62,
            'kode_jabatan'=>'PL21.A2-1',
            'nama'=>'Kepala Lab. Tanah dan Air',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:14:26',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:14:26',
            'jabatan_id'=>41,
            'left'=>17,
            'right'=>18
            ] );
                        
            Jabatan::create( [
            'id'=>63,
            'kode_jabatan'=>'PL21.A1-1',
            'nama'=>'Kepala Lab. Sifat-sifat Kayu dan Analisa Produk',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:17:41',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:17:41',
            'jabatan_id'=>40,
            'left'=>13,
            'right'=>14
            ] );
                        
            Jabatan::create( [
            'id'=>64,
            'kode_jabatan'=>'PL21.A2-2',
            'nama'=>'Kepala Lab. Perencanaan Hutan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:21:42',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:21:42',
            'jabatan_id'=>41,
            'left'=>19,
            'right'=>20
            ] );
                        
            Jabatan::create( [
            'id'=>65,
            'kode_jabatan'=>'PL21.A2-3',
            'nama'=>'Kepala Lab. Silvikultur',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:22:18',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:22:18',
            'jabatan_id'=>41,
            'left'=>21,
            'right'=>22
            ] );
                        
            Jabatan::create( [
            'id'=>66,
            'kode_jabatan'=>'PL21.A2-4',
            'nama'=>'Kepala Lab. Konservasi',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:23:01',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:23:01',
            'jabatan_id'=>41,
            'left'=>23,
            'right'=>24
            ] );
                        
            Jabatan::create( [
            'id'=>67,
            'kode_jabatan'=>'PL21.A2-5',
            'nama'=>'Kepala Lab. Sosial Ekonomi dan Kehutanan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:23:44',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:23:44',
            'jabatan_id'=>41,
            'left'=>25,
            'right'=>26
            ] );
                        
            Jabatan::create( [
            'id'=>68,
            'kode_jabatan'=>'PL21.A2-6',
            'nama'=>'Kepala Lab. Produksi',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:25:04',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:25:04',
            'jabatan_id'=>41,
            'left'=>27,
            'right'=>28
            ] );
                        
            Jabatan::create( [
            'id'=>69,
            'kode_jabatan'=>'PL21.A1-4',
            'nama'=>'Kepala Lab. Persemaian',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:27:08',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:27:08',
            'jabatan_id'=>41,
            'left'=>29,
            'right'=>30
            ] );
                        
            Jabatan::create( [
            'id'=>70,
            'kode_jabatan'=>'PL21.A3-1',
            'nama'=>'Kepala Lab. Kesehatan, Keselamatan Kerja &  Kesehatan Lingkungan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:28:17',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:28:17',
            'jabatan_id'=>44,
            'left'=>33,
            'right'=>34
            ] );
                        
            Jabatan::create( [
            'id'=>71,
            'kode_jabatan'=>'PL21.A3-2',
            'nama'=>'Kepala Lab. Kualitas Udara dan Cuaca',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:28:55',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:28:55',
            'jabatan_id'=>44,
            'left'=>35,
            'right'=>36
            ] );
                        
            Jabatan::create( [
            'id'=>72,
            'kode_jabatan'=>'PL21.B1-1',
            'nama'=>'Kepala Lab. Kebun Percontohan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:30:07',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:30:07',
            'jabatan_id'=>46,
            'left'=>41,
            'right'=>42
            ] );
                        
            Jabatan::create( [
            'id'=>73,
            'kode_jabatan'=>'PL21.B1-2',
            'nama'=>'Kepala Lab. Agronomi',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:30:50',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:30:50',
            'jabatan_id'=>46,
            'left'=>43,
            'right'=>44
            ] );
                        
            Jabatan::create( [
            'id'=>74,
            'kode_jabatan'=>'PL21.B2-1',
            'nama'=>'Kepala Lab. Pengolahan Kelapa Sawit',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:32:34',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:32:34',
            'jabatan_id'=>47,
            'left'=>47,
            'right'=>48
            ] );
                        
            Jabatan::create( [
            'id'=>75,
            'kode_jabatan'=>'PL21.B2-2',
            'nama'=>'Kepala Lab. Pengolahan Hasil Perkebunan',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:33:17',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:33:17',
            'jabatan_id'=>47,
            'left'=>49,
            'right'=>50
            ] );
                        
            Jabatan::create( [
            'id'=>76,
            'kode_jabatan'=>'PL21.B2-3',
            'nama'=>'Kepala Lab. Kimia Analitik',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:34:00',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:34:00',
            'jabatan_id'=>47,
            'left'=>51,
            'right'=>52
            ] );
                        
            Jabatan::create( [
            'id'=>77,
            'kode_jabatan'=>'PL21.B2-4',
            'nama'=>'Kepala Lab. Mikrobiologi',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:34:33',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:34:33',
            'jabatan_id'=>47,
            'left'=>53,
            'right'=>54
            ] );
                        
            Jabatan::create( [
            'id'=>78,
            'kode_jabatan'=>'PL21.B3-1',
            'nama'=>'Kepala Lab. Administrasi Kebun',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:35:54',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:35:54',
            'jabatan_id'=>48,
            'left'=>57,
            'right'=>58
            ] );
                        
            Jabatan::create( [
            'id'=>79,
            'kode_jabatan'=>'PL21.C2-1',
            'nama'=>'Kepala Lab. Geodesi',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:36:55',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:36:55',
            'jabatan_id'=>51,
            'left'=>73,
            'right'=>74
            ] );
                        
            Jabatan::create( [
            'id'=>80,
            'kode_jabatan'=>'PL21.C2-2',
            'nama'=>'Kepala Lab. Penginderaan Jauh dan SIG',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:38:33',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:38:33',
            'jabatan_id'=>51,
            'left'=>75,
            'right'=>76
            ] );
                        
            Jabatan::create( [
            'id'=>81,
            'kode_jabatan'=>'PL21.C2-3',
            'nama'=>'Kepala Lab. Geomatika',
            'kop_file'=>NULL,
            'bidang_id'=>1,
            'created_at'=>'2024-05-28 01:39:18',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-28 01:39:18',
            'jabatan_id'=>51,
            'left'=>77,
            'right'=>78
            ] );
                        
            Jabatan::create( [
            'id'=>85,
            'kode_jabatan'=>'PL20',
            'nama'=>'test',
            'kop_file'=>'test_kop_LPQ.png',
            'bidang_id'=>2,
            'created_at'=>'2024-05-29 21:54:33',
            'deleted_at'=>'2024-05-29 22:00:42',
            'updated_at'=>'2024-05-29 22:00:42',
            'jabatan_id'=>NULL,
            'left'=>NULL,
            'right'=>NULL
            ] );
                        
            Jabatan::create( [
            'id'=>86,
            'kode_jabatan'=>'PL23',
            'nama'=>'test',
            'kop_file'=>'test_kop_YXB.png',
            'bidang_id'=>3,
            'created_at'=>'2024-05-29 22:02:05',
            'deleted_at'=>'2024-05-29 22:02:11',
            'updated_at'=>'2024-05-29 22:02:11',
            'jabatan_id'=>NULL,
            'left'=>NULL,
            'right'=>NULL
            ] );
                        
            Jabatan::create( [
            'id'=>87,
            'kode_jabatan'=>'PL21',
            'nama'=>'test',
            'kop_file'=>'test_kop_SXQ.png',
            'bidang_id'=>2,
            'created_at'=>'2024-05-29 22:03:56',
            'deleted_at'=>'2024-05-29 22:04:02',
            'updated_at'=>'2024-05-29 22:04:02',
            'jabatan_id'=>NULL,
            'left'=>NULL,
            'right'=>NULL
            ] );
                        
            Jabatan::create( [
            'id'=>88,
            'kode_jabatan'=>'1111',
            'nama'=>'1111',
            'kop_file'=>'1111_kop_LY3.png',
            'bidang_id'=>3,
            'created_at'=>'2024-05-29 22:39:30',
            'deleted_at'=>NULL,
            'updated_at'=>'2024-05-29 23:23:34',
            'jabatan_id'=>NULL,
            'left'=>NULL,
            'right'=>NULL
            ] );
    }
}
