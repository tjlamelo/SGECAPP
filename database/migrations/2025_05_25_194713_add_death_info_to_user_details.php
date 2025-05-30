<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->date('date_deces')->nullable();
            $table->time('heure_deces')->nullable();
            $table->string('lieu_deces', 150)->nullable();
            $table->string('cause_deces', 255)->nullable()->comment('Champ chiffré en base');
            $table->string('declarant_deces_nom', 100)->nullable();
            $table->string('declarant_deces_prenoms', 100)->nullable();
            $table->string('declarant_deces_lien', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'date_deces', 'heure_deces', 'lieu_deces', 'cause_deces',
                'declarant_deces_nom', 'declarant_deces_prenoms', 'declarant_deces_lien'
            ]);
        });
    }
};
