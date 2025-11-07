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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            // Relationship to parent program
            $table->foreignId('program_id')->constrained('programs')->cascadeOnDelete();

            // Core info
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('summary')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('budget_amount', 15, 2)->nullable();

            // Optional details
            $table->string('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['planned', 'ongoing', 'completed', 'archived'])->default('planned');

            // Media
            $table->string('hero_image_path')->nullable();
            $table->json('gallery')->nullable();

            // Flexible metrics (e.g. number of people helped)
            $table->json('impact_metrics')->nullable();

            // Access control
            $table->boolean('public')->default(true);
            $table->enum('visibility', ['public','anonymous_public','private'])->default('public');

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['program_id','status','public']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
