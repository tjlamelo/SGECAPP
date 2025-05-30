<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->enum('statut_matrimonial', ['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf/Veuve'])->nullable();

            $table->string('conjoint_nom', 100)->nullable();
            $table->string('conjoint_prenoms', 255)->nullable();
            $table->date('conjoint_date_naissance')->nullable();
            $table->string('conjoint_lieu_naissance', 150)->nullable();
            $table->string('conjoint_profession', 100)->nullable();

            $table->date('date_mariage')->nullable();
            $table->string('lieu_mariage', 150)->nullable();
            $table->string('regime_matrimonial', 50)->nullable()->comment('Communauté réduite, séparation de biens...');
            $table->integer('nombre_enfants')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'statut_matrimonial', 'conjoint_nom', 'conjoint_prenoms',
                'conjoint_date_naissance', 'conjoint_lieu_naissance', 'conjoint_profession',
                'date_mariage', 'lieu_mariage', 'regime_matrimonial', 'nombre_enfants'
            ]);
        });
    }
};
