<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDetailsRequest;
use App\Models\UserDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
class UserInformationsController extends Controller
{
    protected array $sections = [
        'general', 
        'naissance',

        'mariage',
        'deces',
        'profession',
        'coordonnees',
        'reconnaissance',
        'adoption',
    ];

    /**
     * Tableau de bord général (aucune section active).
     */
    public function index(): View
    {
        $user = auth()->user();
        $detail = UserDetail::firstOrNew(['personne_id' => $user->id]);

        $completionPercentage = $this->getOverallCompletionPercentage($detail->toArray());

        return view('user.informations.index', [
            'user' => $user,
            'detail' => $detail,
            'sections' => $this->sections,
            'currentSection' => null,
            'fields' => [],
            'completionPercentage' => $completionPercentage,
        ]);
    }

    private function getOverallCompletionPercentage(array $data): float
    {
        $allFieldNames = $this->getAllFields();

        if (empty($allFieldNames)) {
            return 0;
        }

        $totalFields = count($allFieldNames);
        $filledFields = 0;

        foreach ($allFieldNames as $fieldName) {
            if (!empty(trim((string) ($data[$fieldName] ?? '')))) {
                $filledFields++;
            }
        }

        $percentage = ($filledFields / $totalFields) * 100;
        return round($percentage, 2);
    }

    private function getAllFields(): array
    {
        $allFields = [];
        foreach ($this->sections as $section) {
            $fields = $this->getFieldsForSection($section);
            foreach ($fields as $field) {
                $allFields[$field['name']] = true; // pour avoir des noms uniques
            }
        }
        return array_keys($allFields);
    }



    /**
     * Affiche le formulaire de création / édition pour une section donnée.
     */
    public function edit(string $section): View
    {
        abort_unless(in_array($section, $this->sections), 404);

        $user = auth()->user();
        $detail = UserDetail::firstOrNew(['personne_id' => $user->id]);
        $fields = $this->getFieldsForSection($section);

        $completionPercentage = $this->getOverallCompletionPercentage($detail->toArray());

        return view('user.informations.index', [
            'user' => $user,
            'detail' => $detail,
            'sections' => $this->sections,
            'currentSection' => $section,
            'fields' => $fields,
            'completionPercentage' => $completionPercentage,
        ]);
    }


    /**
     * Crée (POST) la section.
     */
    public function store(UserDetailsRequest $request, string $section): RedirectResponse
    {
        Log::info("Contenu de la requête store", ['requestAll' => $request->all()]);
        return $this->saveSection($request->validated(), $section);
    }


    /**
     * Met à jour (PUT) la section.
     */
    public function update(UserDetailsRequest $request, string $section): RedirectResponse
    {
        return $this->saveSection($request->validated(), $section, true);
    }

    /**
     * Centralise la création ou la mise à jour d'une section.
     *
     * @param  array  $validatedData
     * @param  string $section
     * @param  bool   $isUpdate
     */


    protected function saveSection(array $validatedData, string $section, bool $isUpdate = false): RedirectResponse
    {
        $userId = auth()->id();

        Log::info("Début de l'enregistrement de la section '{$section}' pour l'utilisateur ID {$userId}", [
            'validatedData' => $validatedData,
            'isUpdate' => $isUpdate,
        ]);

        // updateOrCreate sur personne_id
        $detail = UserDetail::updateOrCreate(
            ['personne_id' => $userId],
            ['personne_id' => $userId] // on s'assure qu'il existe
        );

        Log::info("UserDetail récupéré ou créé", ['userDetailId' => $detail->id ?? null]);

        // Ne remplis QUE les champs de la section active
        foreach ($this->getFieldsForSection($section) as $field) {
            $name = $field['name'];
            $oldValue = $detail->$name ?? null;
            $newValue = $validatedData[$name] ?? null;

            $detail->$name = $newValue;

            Log::debug("Champ '{$name}' modifié", [
                'ancien' => $oldValue,
                'nouveau' => $newValue,
            ]);
        }

        $detail->save();

        Log::info("Enregistrement de la section '{$section}' effectué avec succès.", [
            'userDetailId' => $detail->id,
        ]);

        $verb = $isUpdate ? 'mise à jour' : 'créée';

        return redirect()
            ->route('user.informations.edit', ['section' => $section])
            ->with('success', "Section « {$section} » {$verb} avec succès.");
    }


    /**
     * Supprime les données d'une section spécifique.
     */
    public function destroy(string $section): RedirectResponse
    {
        abort_unless(in_array($section, $this->sections), 404);

        $userId = auth()->id();
        $detail = UserDetail::where('personne_id', $userId)->first();

        if ($detail) {
            foreach ($this->getFieldsForSection($section) as $field) {
                $fieldName = $field['name'];
                $detail->$fieldName = null;
            }
            $detail->save();
        }

        return redirect()
            ->route('user.informations.edit', ['section' => $section])
            ->with('success', "Les données de la section « {$section} » ont été supprimées.");
    }

    /**
     * Retourne la configuration des champs par section.
     */
    private function getFieldsForSection(string $section): array
    {
        $fieldsBySection = [
            'general' => [
                ['name' => 'nom_naissance', 'type' => 'text', 'label' => 'Nom de naissance', 'required' => false],
                ['name' => 'nom_usage', 'type' => 'text', 'label' => 'Nom après mariage', 'required' => false],
                ['name' => 'prenoms', 'type' => 'text', 'label' => 'Prénoms', 'required' => false],
                ['name' => 'sexe', 'type' => 'select', 'label' => 'Sexe', 'required' => false, 'options' => ['M' => 'Masculin', 'F' => 'Féminin']],
                ['name' => 'date_naissance', 'type' => 'date', 'label' => 'Date de naissance', 'required' => false],
                ['name' => 'lieu_naissance', 'type' => 'text', 'label' => 'Lieu de naissance', 'required' => false],
                ['name' => 'heure_naissance', 'type' => 'time', 'label' => 'Heure de naissance', 'required' => false],
                ['name' => 'nationalite_origine', 'type' => 'text', 'label' => 'Nationalité d’origine', 'required' => false],
                ['name' => 'nationalite_actuelle', 'type' => 'text', 'label' => 'Nationalité actuelle', 'required' => false],
            ],
            'naissance' => [
                ['name' => 'nom_pere', 'type' => 'text', 'label' => 'Nom du père', 'required' => false],
                ['name' => 'prenoms_pere', 'type' => 'text', 'label' => 'Prénoms du père', 'required' => false],
                ['name' => 'date_naissance_pere', 'type' => 'date', 'label' => 'Date de naissance du père', 'required' => false],
                ['name' => 'lieu_naissance_pere', 'type' => 'text', 'label' => 'Lieu de naissance du père', 'required' => false],
                ['name' => 'profession_pere', 'type' => 'text', 'label' => 'Profession du père', 'required' => false],

                ['name' => 'nom_mere', 'type' => 'text', 'label' => 'Nom de la mère', 'required' => false],
                ['name' => 'prenoms_mere', 'type' => 'text', 'label' => 'Prénoms de la mère', 'required' => false],
                ['name' => 'date_naissance_mere', 'type' => 'date', 'label' => 'Date de naissance de la mère', 'required' => false],
                ['name' => 'lieu_naissance_mere', 'type' => 'text', 'label' => 'Lieu de naissance de la mère', 'required' => false],
                ['name' => 'profession_mere', 'type' => 'text', 'label' => 'Profession de la mère', 'required' => false],

                ['name' => 'declarant_nom', 'type' => 'text', 'label' => 'Nom du déclarant', 'required' => false],
                ['name' => 'declarant_prenoms', 'type' => 'text', 'label' => 'Prénoms du déclarant', 'required' => false],
                ['name' => 'declarant_lien', 'type' => 'text', 'label' => 'Lien du déclarant avec l’enfant', 'required' => false],
            ],


            'mariage' => [
                [
                    'name' => 'statut_matrimonial',
                    'type' => 'select',
                    'label' => 'Statut matrimonial',
                    'required' => false,
                    'options' => [
                        'Célibataire',
                        'Marié(e)',
                        'Divorcé(e)',
                        'Veuf/Veuve'
                    ]
                ],
                ['name' => 'conjoint_nom', 'type' => 'text', 'label' => 'Nom du conjoint', 'required' => false],
                ['name' => 'conjoint_prenoms', 'type' => 'text', 'label' => 'Prénoms du conjoint', 'required' => false],
                ['name' => 'conjoint_date_naissance', 'type' => 'date', 'label' => 'Date de naissance du conjoint', 'required' => false],
                ['name' => 'conjoint_lieu_naissance', 'type' => 'text', 'label' => 'Lieu de naissance du conjoint', 'required' => false],
                ['name' => 'conjoint_profession', 'type' => 'text', 'label' => 'Profession du conjoint', 'required' => false],
                ['name' => 'date_mariage', 'type' => 'date', 'label' => 'Date du mariage', 'required' => false],
                ['name' => 'lieu_mariage', 'type' => 'text', 'label' => 'Lieu du mariage', 'required' => false],
                ['name' => 'regime_matrimonial', 'type' => 'text', 'label' => 'Régime matrimonial', 'required' => false],
                ['name' => 'nombre_enfants', 'type' => 'number', 'label' => 'Nombre d’enfants', 'required' => false],
            ],

            'deces' => [
                ['name' => 'date_deces', 'type' => 'date', 'label' => 'Date du décès', 'required' => false],
                ['name' => 'heure_deces', 'type' => 'time', 'label' => 'Heure du décès', 'required' => false],
                ['name' => 'lieu_deces', 'type' => 'text', 'label' => 'Lieu du décès', 'required' => false],
                ['name' => 'cause_deces', 'type' => 'text', 'label' => 'Cause du décès', 'required' => false],
                ['name' => 'declarant_deces_nom', 'type' => 'text', 'label' => 'Nom du déclarant', 'required' => false],
                ['name' => 'declarant_deces_prenoms', 'type' => 'text', 'label' => 'Prénoms du déclarant', 'required' => false],
                ['name' => 'declarant_deces_lien', 'type' => 'text', 'label' => 'Lien du déclarant', 'required' => false],
            ],

            'profession' => [
                ['name' => 'profession_actuelle', 'type' => 'text', 'label' => 'Profession actuelle', 'required' => false],
                ['name' => 'employeur', 'type' => 'text', 'label' => 'Employeur', 'required' => false],
                ['name' => 'secteur_activite', 'type' => 'text', 'label' => 'Secteur d’activité', 'required' => false],
                ['name' => 'poste_occupe', 'type' => 'text', 'label' => 'Poste occupé', 'required' => false],
                ['name' => 'adresse_professionnelle', 'type' => 'text', 'label' => 'Adresse professionnelle', 'required' => false],
            ],

            'coordonnees' => [
                ['name' => 'adresse', 'type' => 'text', 'label' => 'Adresse', 'required' => true],
                ['name' => 'code_postal', 'type' => 'text', 'label' => 'Code postal', 'required' => true],
                ['name' => 'ville', 'type' => 'text', 'label' => 'Ville', 'required' => true],
                ['name' => 'pays', 'type' => 'text', 'label' => 'Pays', 'required' => true],
                ['name' => 'telephone', 'type' => 'text', 'label' => 'Téléphone', 'required' => false],
                ['name' => 'email', 'type' => 'email', 'label' => 'Email', 'required' => false],
                ['name' => 'numero_secu', 'type' => 'text', 'label' => 'Numéro de sécurité sociale', 'required' => false],
                ['name' => 'type_piece_identite', 'type' => 'text', 'label' => 'Type de pièce d’identité', 'required' => false],
                ['name' => 'numero_piece_identite', 'type' => 'text', 'label' => 'Numéro de pièce d’identité', 'required' => false],
                ['name' => 'date_expiration_piece', 'type' => 'date', 'label' => 'Date d’expiration de la pièce', 'required' => false],
            ],

            'reconnaissance' => [
                ['name' => 'date_reconnaissance', 'type' => 'date', 'label' => 'Date de reconnaissance', 'required' => false],
                ['name' => 'lieu_reconnaissance', 'type' => 'text', 'label' => 'Lieu de reconnaissance', 'required' => false],
                [
                    'name' => 'type_reconnaissance',
                    'type' => 'select',
                    'label' => 'Type de reconnaissance',
                    'required' => false,
                    'options' => [
                        'Paternelle',
                        'Maternelle',
                        'Conjointe',
                        'Posthume'
                    ]
                ],
                ['name' => 'reconnaissant_nom', 'type' => 'text', 'label' => 'Nom du reconnaissant', 'required' => false],
                ['name' => 'reconnaissant_prenoms', 'type' => 'text', 'label' => 'Prénoms du reconnaissant', 'required' => false],
                ['name' => 'reconnaissant_date_naissance', 'type' => 'date', 'label' => 'Date de naissance du reconnaissant', 'required' => false],
                ['name' => 'reconnaissant_lieu_naissance', 'type' => 'text', 'label' => 'Lieu de naissance du reconnaissant', 'required' => false],
                ['name' => 'reconnaissant_lien_parente', 'type' => 'text', 'label' => 'Lien de parenté du reconnaissant', 'required' => false],
            ],

            'adoption' => [
                ['name' => 'date_adoption', 'type' => 'date', 'label' => 'Date d’adoption', 'required' => false],
                ['name' => 'jugement_adoption_numero', 'type' => 'text', 'label' => 'Numéro du jugement d’adoption', 'required' => false],
                ['name' => 'tribunal_adoption', 'type' => 'text', 'label' => 'Tribunal d’adoption', 'required' => false],
                [
                    'name' => 'type_adoption',
                    'type' => 'select',
                    'label' => 'Type d’adoption',
                    'required' => false,
                    'options' => [
                        'Pleine',
                        'Simple',
                        'Internationale'
                    ]
                ],
                ['name' => 'adoptant1_nom', 'type' => 'text', 'label' => 'Nom du premier adoptant', 'required' => false],
                ['name' => 'adoptant1_prenoms', 'type' => 'text', 'label' => 'Prénoms du premier adoptant', 'required' => false],
                ['name' => 'adoptant2_nom', 'type' => 'text', 'label' => 'Nom du second adoptant', 'required' => false],
                ['name' => 'adoptant2_prenoms', 'type' => 'text', 'label' => 'Prénoms du second adoptant', 'required' => false],
            ],
        ];

        return $fieldsBySection[$section] ?? [];
    }


}



