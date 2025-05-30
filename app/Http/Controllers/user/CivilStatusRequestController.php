<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\CivilStatusRequest;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class CivilStatusRequestController extends Controller
{
    use AuthorizesRequests;
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

    public function show(int $requestId)
    {
        // Récupérer la demande avec utilisateur
        $demande = CivilStatusRequest::with('user')->findOrFail($requestId);

        // Récupérer les détails utilisateur
        $userDetails = UserDetail::with('documents')->where('personne_id', $demande->user_id)->first();

        // Type d'acte
        $typeActe = $demande->acte_type;

        // Champs à afficher
        $generalFields = $this->getFieldsForSection('general');
        $specificFields = $this->getFieldsForSection($typeActe);
        $fieldsToShow = array_merge($generalFields, $specificFields);

        return view('user.etatcivil.show', [
            'demande' => $demande,
            'userDetails' => $userDetails,
            'fields' => $fieldsToShow,
            'documents' => $userDetails ? $userDetails->documents : collect(),
        ]);
    }
    /**
     * Génère et télécharge le PDF d'une demande approuvée.
     */
    public function generate(CivilStatusRequest $civilStatusRequest)
    {
        $this->authorizeUser($civilStatusRequest);

        if ($civilStatusRequest->status !== 'approuve') {
            abort(403, "Le document n'est disponible qu'après approbation.");
        }

        // Récupérer l'utilisateur et ses détails
        $user = $civilStatusRequest->user;
        $userDetails = UserDetail::with('documents')->where('personne_id', $user->id)->first();

        // Champs à afficher
        $generalFields = $this->getFieldsForSection('general');
        $specificFields = $this->getFieldsForSection($civilStatusRequest->acte_type);
        $allFields = array_merge($generalFields, $specificFields);
        $fields = array_filter($allFields, function ($field) use ($userDetails) {
            $fieldName = $field['name'];
            return $userDetails && !is_null($userDetails->$fieldName);
        });
        // Données à passer à la vue PDF
        $data = [
            'demande' => $civilStatusRequest,
            'userDetails' => $userDetails,
            'fields' => $fields,
            'documents' => $userDetails ? $userDetails->documents : collect(),
        ];

        // Génération du PDF
        $pdf = PDF::loadView('pdf.etatcivil', $data);

        // Téléchargement du PDF
        return $pdf->download("etat_civil_{$civilStatusRequest->id}.pdf");
    }

    /**
     * Télécharge le PDF généré d'une demande approuvée.
     */
    public function downloadPdf($id)
    {
        // Récupérer la demande
        $request = CivilStatusRequest::with('userDetail', 'userDetail.documents')->findOrFail($id);

        // Vérifier que la demande appartient à l'utilisateur connecté
        if ($request->userDetail->personne_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Charger les documents liés
        $documents = $request->userDetail->documents ?? [];

        // Générer le PDF
        $pdf = Pdf::loadView('pdf.etatcivil', [
            'request' => $request,
            'userDetail' => $request->userDetail,
            'documents' => $documents,
        ]);

        return $pdf->download('demande_etat_civil_' . $id . '.pdf');
    }


    /**
     * Génère le PDF pour une demande donnée.
     */
    protected function generatePdfDocument(CivilStatusRequest $request)
    {
        $documents = UserDocument::whereIn('id', json_decode($request->documents_ids, true))->get();

        return Pdf::loadView('pdf.etatcivil', [
            'request' => $request,
            'documents' => $documents,
            'user' => $request->user,
        ]);
    }


    /**
     * Affiche la liste des demandes de l'utilisateur connecté.
     */
    public function index()
    {
        $requests = CivilStatusRequest::where('user_id', Auth::id())->latest()->get();
        return view('user.etatcivil.index', compact('requests'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle demande.
     */
    public function create()
    {
        $userDocuments = $this->getUserDocuments();
        return view('user.etatcivil.form', compact('userDocuments'));
    }

    /**
     * Affiche le formulaire d'édition d'une demande spécifique.
     */
    public function edit(CivilStatusRequest $civilStatusRequest)
    {
        $this->authorizeUser($civilStatusRequest);

        $userDocuments = $this->getUserDocuments();
        $selectedDocuments = json_decode($civilStatusRequest->documents_ids, true);

        return view('user.etatcivil.form', compact('civilStatusRequest', 'userDocuments', 'selectedDocuments'));
    }

    /**
     * Met à jour une demande existante.
     */
    public function update(Request $request, CivilStatusRequest $civilStatusRequest)
    {
        $this->authorizeUser($civilStatusRequest);

        if ($civilStatusRequest->status !== 'en_attente') {
            return back()->with('error', 'Seules les demandes en attente peuvent être modifiées.');
        }

        $validated = $this->validateRequest($request);

        $civilStatusRequest->update([
            'acte_type' => $validated['acte_type'],
            'documents_ids' => json_encode($validated['documents_ids']),
        ]);

        return redirect()->route('user.civil_status_requests.index')->with('success', 'Demande mise à jour avec succès.');
    }

    /**
     * Enregistre une nouvelle demande.
     */
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        CivilStatusRequest::create([
            'user_id' => Auth::id(),
            'acte_type' => $validated['acte_type'],
            'documents_ids' => json_encode($validated['documents_ids']),
            'status' => 'en_attente', // initial status
        ]);

        return redirect()->route('user.civil_status_requests.index')->with('success', 'Demande envoyée avec succès.');
    }

    /**
     * Affiche le détail d'une demande.
     */

    /**
     * Supprime une demande.
     */
    public function destroy(CivilStatusRequest $civilStatusRequest)
    {
        $this->authorizeUser($civilStatusRequest);

        if ($civilStatusRequest->status !== 'en_attente') {
            return redirect()->back()->with('error', 'Seules les demandes en attente peuvent être supprimées.');
        }

        $civilStatusRequest->delete();

        return redirect()->route('user.civil_status_requests.index')->with('success', 'Demande supprimée.');
    }

    /**
     * Approuve une demande et génère le document PDF associé.
     */
    public function approveRequest(CivilStatusRequest $request)
    {
        // Ici, tu pourrais aussi vérifier les droits admin ou autre
        $request->status = 'approuve';
        $request->save();

        $pdf = $this->generatePdfDocument($request);

        $filePath = 'documents/etat_civil_request_' . $request->id . '.pdf';
        Storage::disk('public')->put($filePath, $pdf->output());

        UserDocument::create([
            'user_id' => $request->user_id,
            'type' => $request->acte_type,
            'path' => $filePath,
            'civil_status_request_id' => $request->id,
        ]);

        return redirect()->back()->with('success', 'Demande approuvée et document généré.');
    }




    /**
     * Récupère les documents de l'utilisateur connecté via userDetail.
     */
    private function getUserDocuments()
    {
        return UserDocument::whereHas('userDetail', function ($query) {
            $query->where('personne_id', Auth::id());
        })->get();
    }

    /**
     * Valide la requête d'envoi ou de mise à jour.
     */
    private function validateRequest(Request $request): array
    {
        return $request->validate([
            'acte_type' => 'required|in:naissance,mariage,deces,divorce',
            'documents_ids' => 'required|array|min:1',
            'documents_ids.*' => 'exists:user_documents,id',
        ]);
    }

    /**
     * Vérifie que l'utilisateur connecté est bien propriétaire de la demande.
     */
    private function authorizeUser(CivilStatusRequest $civilStatusRequest)
    {
        if ($civilStatusRequest->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }
    }
}
