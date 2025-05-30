<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('nom_naissance', 100)->nullable();
            $table->string('nom_usage', 100)->nullable()->comment('Nom après mariage');
            $table->string('prenoms', 255)->nullable();
            $table->enum('sexe', ['M', 'F'])->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance', 150)->nullable()->comment('Format: "Ville, Pays"');
            $table->time('heure_naissance')->nullable();
            $table->string('nationalite_origine', 100)->nullable();
            $table->string('nationalite_actuelle', 100)->nullable();

            $table->index(['nom_naissance', 'prenoms'], 'idx_identite');
            $table->index('date_naissance', 'idx_date_naissance');
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropIndex('idx_identite');
            $table->dropIndex('idx_date_naissance');
            $table->dropColumn([
                'nom_naissance', 'nom_usage', 'prenoms', 'sexe',
                'date_naissance', 'lieu_naissance', 'heure_naissance',
                'nationalite_origine', 'nationalite_actuelle'
            ]);
        });
    }
};
