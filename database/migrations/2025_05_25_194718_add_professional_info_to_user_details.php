<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('profession_actuelle', 100)->nullable();
            $table->string('employeur', 100)->nullable();
            $table->string('secteur_activite', 50)->nullable()->comment('Public, Privé, etc.');
            $table->string('poste_occupe', 100)->nullable();
            $table->string('adresse_professionnelle', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'profession_actuelle', 'employeur', 'secteur_activite',
                'poste_occupe', 'adresse_professionnelle'
            ]);
        });
    }
};
