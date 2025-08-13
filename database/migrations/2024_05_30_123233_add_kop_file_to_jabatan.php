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
        Schema::table('jabatan', function (Blueprint $table) {
            // Add the kop_file column for file upload name
            $table->string('kop_file')->nullable()->after('nama'); // Replace 'other_column' with the column after which you want to add this new column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jabatan', function (Blueprint $table) {
            // Drop the kop_file column if exists
            $table->dropColumn('kop_file');
        });
    }
};
