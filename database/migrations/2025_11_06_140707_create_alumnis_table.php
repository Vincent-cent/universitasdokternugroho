<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('angkatan');
            $table->string('year_range'); // contoh: 2018-2022
            $table->string('photo')->nullable();
            $table->string('work_main')->nullable();
            $table->text('work_main_address')->nullable();
            $table->string('work_secondary')->nullable();
            $table->text('work_secondary_desc')->nullable();
            $table->text('about')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};