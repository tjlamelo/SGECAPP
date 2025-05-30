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
        Schema::create('civil_status_requests', function (Blueprint $table) {
             $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->enum('acte_type', ['naissance', 'mariage', 'deces', 'divorce']);
        $table->json('documents_ids'); // stocke les IDs des documents joints
        $table->enum('status', ['en_attente', 'approuve', 'rejete'])->default('en_attente');
        $table->text('rejection_reason')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('civil_status_requests');
    }
};
