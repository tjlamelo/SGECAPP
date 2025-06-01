<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDocument;
use App\Models\UserDetail;
use App\Models\CivilStatusRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
public function index()
{
    $user = auth()->user();

    // Récupération ou création du user_detail lié à l'utilisateur connecté
    $detail = UserDetail::firstOrNew(['personne_id' => $user->id]);

    // Récupérer les documents (en passant par le bon user_detail_id)
    $documents = UserDocument::with('userDetail')
                    ->where('user_detail_id', $detail->id)
                    ->latest()
                    ->take(3)
                    ->get();

    // Récupérer les demandes liées à l'utilisateur
    $requests = CivilStatusRequest::where('user_id', $user->id)
                    ->latest()
                    ->take(3)
                    ->get();

    // Calcul du taux de complétion
    $completionPercentage = $this->getOverallCompletionPercentage($detail->toArray());

    // Statistiques des demandes d’état civil
    $totalRequests = CivilStatusRequest::where('user_id', $user->id)->count();
    $validatedRequests = CivilStatusRequest::where('user_id', $user->id)->where('status', 'valide')->count();
    $refusedRequests = CivilStatusRequest::where('user_id', $user->id)->where('status', 'refuse')->count();
    $pendingRequests = CivilStatusRequest::where('user_id', $user->id)->where('status', 'en_attente')->count();

    // Statistiques des documents (corrigé avec user_detail_id)
    $totalDocuments = UserDocument::where('user_detail_id', $detail->id)->count();
    $validatedDocuments = UserDocument::where('user_detail_id', $detail->id)->where('verification_status', 'approved')->count();
    $refusedDocuments = UserDocument::where('user_detail_id', $detail->id)->where('verification_status', 'rejected')->count();
    $pendingDocuments = UserDocument::where('user_detail_id', $detail->id)->where('verification_status', 'pending')->count();

    return view('user.home', [
        'documents' => $documents,
        'requests' => $requests,
        'completionPercentage' => $completionPercentage,

        // Statistiques à afficher dans la vue
        'totalRequests' => $totalRequests,
        'validatedRequests' => $validatedRequests,
        'refusedRequests' => $refusedRequests,
        'pendingRequests' => $pendingRequests,

        'totalDocuments' => $totalDocuments,
        'validatedDocuments' => $validatedDocuments,
        'refusedDocuments' => $refusedDocuments,
        'pendingDocuments' => $pendingDocuments,
    ]);
}

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
