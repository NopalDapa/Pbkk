<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->text('tentang')->nullable();
            $table->text('minat')->nullable();
            $table->string('ide_judul')->nullable();
            $table->text('ide_deskripsi')->nullable();
            $table->text('ide_alur')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn(['email', 'tentang', 'minat', 'ide_judul', 'ide_deskripsi', 'ide_alur']);
        });
    }
};
