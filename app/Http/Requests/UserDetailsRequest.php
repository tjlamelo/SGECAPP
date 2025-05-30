<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserDetailsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $section = $this->route('section'); // Récupération de la section en cours

        return match ($section) {
            'general' => [
                'nom_naissance' => ['nullable', 'string', 'max:100'],
                'nom_usage' => ['nullable', 'string', 'max:100'],
                'prenoms' => ['nullable', 'string', 'max:255'],
                'sexe' => ['nullable', 'in:M,F'],
                'date_naissance' => ['nullable', 'date', 'before:today'],
                'lieu_naissance' => ['nullable', 'string', 'max:150'],
                'heure_naissance' => ['nullable', 'date_format:H:i'],
                'nationalite_origine' => ['nullable', 'string', 'max:100'],
                'nationalite_actuelle' => ['nullable', 'string', 'max:100'],
            ],

            'naissance' => [
                'nom_pere' => ['nullable', 'string', 'max:100'],
                'prenoms_pere' => ['nullable', 'string', 'max:255'],
                'date_naissance_pere' => ['nullable', 'date', 'before:today'],
                'lieu_naissance_pere' => ['nullable', 'string', 'max:150'],
                'profession_pere' => ['nullable', 'string', 'max:100'],

                'nom_mere' => ['nullable', 'string', 'max:100'],
                'prenoms_mere' => ['nullable', 'string', 'max:255'],
                'date_naissance_mere' => ['nullable', 'date', 'before:today'],
                'lieu_naissance_mere' => ['nullable', 'string', 'max:150'],
                'profession_mere' => ['nullable', 'string', 'max:100'],

                'declarant_nom' => ['nullable', 'string', 'max:100'],
                'declarant_prenoms' => ['nullable', 'string', 'max:255'],
                'declarant_lien' => ['nullable', 'string', 'max:100'],
            ],

            'mariage' => [
                'statut_matrimonial' => [
                    'nullable',
                     
                ],
                'conjoint_nom' => ['nullable', 'string', 'max:100'],
                'conjoint_prenoms' => ['nullable', 'string', 'max:255'],
                'conjoint_date_naissance' => ['nullable', 'date', 'before:today'],
                'conjoint_lieu_naissance' => ['nullable', 'string', 'max:150'],
                'conjoint_profession' => ['nullable', 'string', 'max:100'],
                'date_mariage' => ['nullable', 'date', 'before_or_equal:today'],
                'lieu_mariage' => ['nullable', 'string', 'max:150'],
                'regime_matrimonial' => ['nullable', 'string', 'max:50'],
                'nombre_enfants' => ['nullable', 'integer', 'min:0'],
            ],

            'deces' => [
                'date_deces' => ['nullable', 'date', 'before_or_equal:today'],
                'heure_deces' => ['nullable', 'date_format:H:i'],
                'lieu_deces' => ['nullable', 'string', 'max:150'],
                'cause_deces' => ['nullable', 'string', 'max:255'],
                'declarant_deces_nom' => ['nullable', 'string', 'max:100'],
                'declarant_deces_prenoms' => ['nullable', 'string', 'max:255'],
                'declarant_deces_lien' => ['nullable', 'string', 'max:100'],
            ],

            'profession' => [
                'profession_actuelle' => ['nullable', 'string', 'max:150'],
                'employeur' => ['nullable', 'string', 'max:150'],
                'secteur_activite' => ['nullable', 'string', 'max:150'],
                'poste_occupe' => ['nullable', 'string', 'max:150'],
                'adresse_professionnelle' => ['nullable', 'string', 'max:255'],
            ],

            'coordonnees' => [
                'adresse' => ['nullable', 'string', 'max:255'],
                'code_postal' => ['nullable', 'string', 'max:20'],
                'ville' => ['nullable', 'string', 'max:100'],
                'pays' => ['nullable', 'string', 'max:100'],
                'telephone' => ['nullable', 'string', 'max:20'],
                'email' => ['nullable', 'email', 'max:255'],
                'numero_secu' => ['nullable', 'string', 'max:50'],
                'type_piece_identite' => ['nullable', 'string', 'max:100'],
                'numero_piece_identite' => ['nullable', 'string', 'max:100'],
                'date_expiration_piece' => ['nullable', 'date', 'after_or_equal:today'],
            ],

            'reconnaissance' => [
                'date_reconnaissance' => ['nullable', 'date', 'before_or_equal:today'],
                'lieu_reconnaissance' => ['nullable', 'string', 'max:150'],
                'type_reconnaissance' => [
                    'nullable',
                    Rule::in(['Paternelle', 'Maternelle', 'Conjointe', 'Posthume']),
                ],
                'reconnaissant_nom' => ['nullable', 'string', 'max:100'],
                'reconnaissant_prenoms' => ['nullable', 'string', 'max:255'],
                'reconnaissant_date_naissance' => ['nullable', 'date', 'before:today'],
                'reconnaissant_lieu_naissance' => ['nullable', 'string', 'max:150'],
                'reconnaissant_lien_parente' => ['nullable', 'string', 'max:100'],
            ],

            'adoption' => [
                'date_adoption' => ['nullable', 'date', 'before_or_equal:today'],
                'jugement_adoption_numero' => ['nullable', 'string', 'max:100'],
                'tribunal_adoption' => ['nullable', 'string', 'max:150'],
                'type_adoption' => [
                    'nullable',
                    Rule::in(['Pleine', 'Simple', 'Internationale']),
                ],
                'adoptant1_nom' => ['nullable', 'string', 'max:100'],
                'adoptant1_prenoms' => ['nullable', 'string', 'max:255'],
                'adoptant2_nom' => ['nullable', 'string', 'max:100'],
                'adoptant2_prenoms' => ['nullable', 'string', 'max:255'],
            ],

            default => [],
        };
    }
}
