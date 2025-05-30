<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->date('date_reconnaissance')->nullable();
            $table->string('lieu_reconnaissance', 150)->nullable();
            $table->enum('type_reconnaissance', ['Paternelle', 'Maternelle', 'Conjointe', 'Posthume'])->nullable();
            $table->string('reconnaissant_nom', 100)->nullable();
            $table->string('reconnaissant_prenoms', 255)->nullable();
            $table->date('reconnaissant_date_naissance')->nullable();
            $table->string('reconnaissant_lieu_naissance', 150)->nullable();
            $table->string('reconnaissant_lien_parente', 100)->nullable()->comment('Père, mère, tuteur...');
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'date_reconnaissance', 'lieu_reconnaissance', 'type_reconnaissance',
                'reconnaissant_nom', 'reconnaissant_prenoms', 'reconnaissant_date_naissance',
                'reconnaissant_lieu_naissance', 'reconnaissant_lien_parente'
            ]);
        });
    }
};
