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
        Schema::table('hero_sliders', function (Blueprint $table) {
            // 1. Tambah kolom yang benar-benar belum ada di SQL Anda
            if (!Schema::hasColumn('hero_sliders', 'video_url')) {
                $table->string('video_url')->nullable()->after('image_path');
            }

            if (!Schema::hasColumn('hero_sliders', 'nav_label')) {
                $table->string('nav_label')->nullable()->after('title');
            }

            if (!Schema::hasColumn('hero_sliders', 'duration')) {
                $table->integer('duration')->default(5)->after('video_url');
            }

            // 2. Ubah kolom yang sudah ada agar menjadi nullable (Opsional)
            // Note: Anda perlu menginstal doctrine/dbal jika menggunakan Laravel versi lama
            // tetapi di Laravel 10/11 sudah bawaan.
            $table->string('title')->nullable()->change();
            $table->text('subtitle')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('hero_sliders', function (Blueprint $table) {
            // Hanya hapus kolom yang kita tambahkan di atas
            $table->dropColumn(['video_url', 'nav_label', 'duration']);
        });
    }
};
