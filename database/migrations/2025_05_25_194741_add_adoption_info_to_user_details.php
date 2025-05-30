<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->date('date_adoption')->nullable();
            $table->string('jugement_adoption_numero', 50)->nullable();
            $table->string('tribunal_adoption', 100)->nullable();
            $table->enum('type_adoption', ['Pleine', 'Simple', 'Internationale'])->nullable();
            $table->string('adoptant1_nom', 100)->nullable();
            $table->string('adoptant1_prenoms', 255)->nullable();
            $table->string('adoptant2_nom', 100)->nullable();
            $table->string('adoptant2_prenoms', 255)->nullable();
            $table->text('mention_marginale')->nullable()->comment('Mentions légales liées à l\'adoption');
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'date_adoption', 'jugement_adoption_numero', 'tribunal_adoption',
                'type_adoption', 'adoptant1_nom', 'adoptant1_prenoms',
                'adoptant2_nom', 'adoptant2_prenoms', 'mention_marginale'
            ]);
        });
    }
};
