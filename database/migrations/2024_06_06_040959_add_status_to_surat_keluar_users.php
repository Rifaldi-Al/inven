<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('surat_keluar_users', function (Blueprint $table) {
            $table->enum('status_baca', ['belum-dilihat', 'sudah-dilihat', 'sudah-disetujui'])->nullable();
            $table->enum('status_penanda_tangan', ['1', '0'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
