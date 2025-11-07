<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('activity_collaborator', function (Blueprint $table) {
        $table->id();
        $table->foreignId('activity_id')->constrained('activities')->cascadeOnDelete();
        $table->foreignId('collaborator_id')->constrained('collaborators')->cascadeOnDelete();

        // Pivot data
        $table->string('role')->nullable();
        $table->enum('contribution_type', ['cash','in-kind','service'])->nullable();
        $table->decimal('contribution_amount', 15, 2)->nullable();
        $table->decimal('contribution_percentage', 5, 2)->nullable();
        $table->boolean('is_primary')->default(false);
        $table->text('impact_note')->nullable();
        $table->enum('visibility', ['public','anonymous_public','private'])->default('public');
        $table->timestamps();

        // Avoid duplicates
        $table->unique(['activity_id','collaborator_id'], 'activity_collab_unique');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_collaborator');
    }
};
