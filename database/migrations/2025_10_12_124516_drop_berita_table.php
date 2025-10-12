<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void {
        Schema::dropIfExists('berita');
    }

    public function down(): void {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // Tambahkan kolom lain kalau perlu
        });
    }
};

