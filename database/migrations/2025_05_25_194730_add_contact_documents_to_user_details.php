<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('adresse', 255)->nullable();
            $table->string('code_postal', 10)->nullable();
            $table->string('ville', 100)->nullable();
            $table->string('pays', 100)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('numero_secu', 15)->nullable()->comment('Chiffré en base');
            $table->string('type_piece_identite', 30)->nullable()->comment('CNI, Passeport...');
            $table->string('numero_piece_identite', 50)->nullable()->comment('Chiffré en base');
            $table->date('date_expiration_piece')->nullable();

            $table->index('numero_secu', 'idx_secu');
        });
    }

    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropIndex('idx_secu');
            $table->dropColumn([
                'adresse', 'code_postal', 'ville', 'pays', 'telephone', 'email',
                'numero_secu', 'type_piece_identite', 'numero_piece_identite', 'date_expiration_piece'
            ]);
        });
    }
};
