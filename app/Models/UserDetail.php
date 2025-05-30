<?php
// app/Models/UserDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'personne_id', 'nom_naissance', 'nom_usage', 'prenoms', 'sexe', 'date_naissance',
        'lieu_naissance', 'heure_naissance', 'nationalite_origine', 'nationalite_actuelle',
        'nom_pere', 'prenoms_pere', 'date_naissance_pere', 'lieu_naissance_pere', 'profession_pere',
        'nom_mere', 'prenoms_mere', 'date_naissance_mere', 'lieu_naissance_mere', 'profession_mere',
        'declarant_nom', 'declarant_prenoms', 'declarant_lien',
        'statut_matrimonial', 'conjoint_nom', 'conjoint_prenoms', 'conjoint_date_naissance',
        'conjoint_lieu_naissance', 'conjoint_profession', 'date_mariage', 'lieu_mariage',
        'regime_matrimonial', 'nombre_enfants', 'date_deces', 'heure_deces', 'lieu_deces',
        'cause_deces', 'declarant_deces_nom', 'declarant_deces_prenoms', 'declarant_deces_lien',
        'profession_actuelle', 'employeur', 'secteur_activite', 'poste_occupe',
        'adresse_professionnelle', 'adresse', 'code_postal', 'ville', 'pays', 'telephone',
        'email', 'numero_secu', 'type_piece_identite', 'numero_piece_identite',
        'date_expiration_piece', 'date_reconnaissance', 'lieu_reconnaissance',
        'type_reconnaissance', 'reconnaissant_nom', 'reconnaissant_prenoms',
        'reconnaissant_date_naissance', 'reconnaissant_lieu_naissance',
        'reconnaissant_lien_parente', 'date_adoption', 'jugement_adoption_numero',
        'tribunal_adoption', 'type_adoption', 'adoptant1_nom', 'adoptant1_prenoms',
        'adoptant2_nom', 'adoptant2_prenoms', 'mention_marginale'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'personne_id');
    }
 
 
public function documents()
{
    return $this->hasMany(UserDocument::class);
}

 
 
}
