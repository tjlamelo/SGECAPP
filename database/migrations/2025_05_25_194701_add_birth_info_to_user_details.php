<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('nom_pere', 100)->nullable();
            $table->string('prenoms_pere', 255)->nullable();
            $table->date('date_naissance_pere')->nullable();
            $table->string('lieu_naissance_pere', 150)->nullable();
            $table->string('profession_pere', 100)->nullable();

            $table->string('nom_mere', 100)->nullable();
            $table->string('prenoms_mere', 255)->nullable();
            $table->date('date_naissance_mere')->nullable();
            $table->string('lieu_naissance_mere', 150)->nullable();
            $table->string('profession_mere', 100)->nullable();

            $table->string('declarant_nom', 100)->nullable()->comment('Si autre que parent');
            $table->string('declarant_prenoms', 100)->nullable();
            $table->string('declarant_lien', 50)->nullable()->comment('Lien avec le nouveau-né');
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'nom_pere', 'prenoms_pere', 'date_naissance_pere', 'lieu_naissance_pere', 'profession_pere',
                'nom_mere', 'prenoms_mere', 'date_naissance_mere', 'lieu_naissance_mere', 'profession_mere',
                'declarant_nom', 'declarant_prenoms', 'declarant_lien'
            ]);
        });
    }
};
