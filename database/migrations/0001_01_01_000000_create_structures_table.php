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
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de la structure (ex: Mairie de Yopougon)
            $table->string('type'); // Type : mairie, hopital, tribunal, ministère, etc.
            $table->string('code')->nullable(); // Code unique interne ou officiel (ex: code commune)
            $table->string('responsable_nom')->nullable(); // Nom du responsable
            $table->string('responsable_fonction')->nullable(); // Fonction (maire, directeur, juge, etc.)
            $table->string('adresse')->nullable(); // Adresse physique
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('actif')->default(true); // Actif ou non
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structures');
    }
};
