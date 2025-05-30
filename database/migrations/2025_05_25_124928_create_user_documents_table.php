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
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            
            // Clé étrangère
            $table->foreignId('user_detail_id')
                  ->constrained('user_details')
                  ->cascadeOnDelete();
            
            // Type de document
            $table->enum('document_type', [
                'CNI',
                'Passeport',
                'Permis_conduire',
                'Carte_sejour',
                'Acte_naissance',
                'Justificatif_domicile',
                'Livret_famille',
                'Acte_mariage',
                'Acte_deces',
                'Autre'
            ])->default('CNI');
            
            // Métadonnées du document
            $table->string('document_number')->nullable()->comment('Numéro chiffré');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('issuing_authority', 100)->nullable();
            
            // Stockage des fichiers
            $table->string('front_path', 255)->comment('Chemin chiffré recto');
            $table->string('back_path', 255)->nullable()->comment('Chemin chiffré verso');
            $table->string('mime_type', 50)->comment('Type de fichier');
            $table->unsignedInteger('file_size')->comment('Taille en octets');
            
            // Vérification et statut
            $table->string('file_hash', 64)->comment('Hash SHA-256 pour intégrité');
            $table->enum('verification_status', [
                'pending',
                'approved',
                'rejected',
                'expired'
            ])->default('pending');
            $table->text('rejection_reason')->nullable();
            
            // Audit
            $table->foreignId('verified_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Index
            $table->index(['user_detail_id', 'document_type'], 'user_doc_type_index');
            $table->index('expiry_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_documents');
    }
};