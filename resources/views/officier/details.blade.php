<x-officier-layout>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Détails de la demande #{{ $request->id }}</h1>

        <!-- Informations utilisateur -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-6 border-b pb-2 border-gray-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Informations utilisateur
            </h2>

            @php
            $sections = ['general', 'naissance', 'mariage', 'deces', 'profession', 'coordonnees', 'reconnaissance', 'adoption'];
            function getFieldsForSection(string $section): array
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


            @endphp

            @if ($request->user && $request->user->userDetail)
            @foreach ($sections as $section)
            @php
            $fields = getFieldsForSection($section);
            @endphp
            @if(count($fields) > 0)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 transition transform hover:shadow-lg">
                <h3 class="text-xl font-medium text-gray-700 capitalize mb-4">{{ $section }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($fields as $field)
                    @php
                    $value = $request->user->userDetail->{$field['name']} ?? null;
                    @endphp
                    <div class="border border-gray-200 rounded-md p-3 bg-gray-50">
                        <label class="block text-sm font-semibold text-gray-600 mb-1">{{ $field['label'] }}</label>
                        @if ($field['type'] === 'select' && isset($field['options']))
                        <select id="{{ $field['name'] }}" name="{{ $field['name'] }}" disabled class="w-full text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed">
                            <option value="">-</option>
                            @foreach ($field['options'] as $optionKey => $optionLabel)
                            @if (is_int($optionKey))
                            <option value="{{ $optionLabel }}" {{ $value == $optionLabel ? 'selected' : '' }}>
                                {{ $optionLabel }}
                            </option>
                            @else
                            <option value="{{ $optionKey }}" {{ $value == $optionKey ? 'selected' : '' }}>
                                {{ $optionLabel }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                        @else
                        <p class="text-gray-800 text-sm">
                            {{ $value !== null && $value !== '' ? $value : '—' }}
                        </p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
            @else
            @endif
        </section>
        <!-- Documents soumis -->

<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-6 border-b pb-2 border-gray-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        Documents soumis
    </h2>

    @if ($request->user && $request->user->userDetail && $request->user->userDetail->documents->count() > 0)
    <div class="space-y-6">
        @foreach ($request->user->userDetail->documents as $doc)
        <div class="bg-white rounded-lg shadow p-6 border-l-4 
            {{ $doc->verification_status=== 'approuved' ? 'border-green-500' : 
               ($doc->verification_status=== 'rejected' ? 'border-red-500' : 'border-indigo-500') }}">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p><strong>Type :</strong> {{ $doc->document_type ?? '—' }}</p>
                <p><strong>Numéro :</strong> {{ $doc->document_number ?? '—' }}</p>
                <p><strong>Date émission :</strong> {{ optional($doc->issue_date)->format('d/m/Y') ?? '—' }}</p>
                <p><strong>Date expiration :</strong> {{ optional($doc->expiry_date)->format('d/m/Y') ?? '—' }}</p>
                <p><strong>Autorité émettrice :</strong> {{ $doc->issuing_authority ?? '—' }}</p>
            </div>

            <!-- Affichage des images avec lightbox -->
            <div class="mt-4 flex space-x-4">
                @if ($doc->front_path)
                <a href="{{ asset('storage/' . $doc->front_path) }}" data-lightbox="doc-{{ $doc->id }}" data-title="{{ $doc->document_type }} (Recto)">
                    <img src="{{ asset('storage/' . $doc->front_path) }}" alt="Recto document" class="max-w-xs rounded border border-gray-300 shadow-sm cursor-pointer hover:opacity-90 transition" />
                </a>
                @endif

                @if ($doc->back_path)
                <a href="{{ asset('storage/' . $doc->back_path) }}" data-lightbox="doc-{{ $doc->id }}" data-title="{{ $doc->document_type }} (Verso)">
                    <img src="{{ asset('storage/' . $doc->back_path) }}" alt="Verso document" class="max-w-xs rounded border border-gray-300 shadow-sm cursor-pointer hover:opacity-90 transition" />
                </a>
                @endif
            </div>

            <!-- Statut et actions -->
            <div class="mt-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <p class="font-medium">Statut du document:</p>
                    <span class="px-3 py-1 text-sm font-semibold rounded-full
                        {{ $doc->verification_status === 'approved' ? 'bg-green-100 text-green-800' : 
                           ($doc->verification_status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($doc->verification_status ?? 'en_attente') }}
                    </span>

                    @if($doc->verification_status === 'rejected' && $doc->rejection_reason)
                    <div class="mt-2 text-red-600 text-sm">
                        <strong>Motif de rejet:</strong> {{ $doc->rejection_reason }}
                    </div>
                    @endif
                </div>

                <!-- Actions d'approbation/rejet -->
                <div class="flex flex-wrap gap-2">
                    <!-- Approbation document -->
                    <form action="{{ route('officier.documents.approve', $doc->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md text-sm flex items-center disabled:opacity-50 disabled:cursor-not-allowed" {{ $doc->status === 'approuve' ? 'disabled' : '' }}>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Approuver
                        </button>
                    </form>

                    <!-- Rejet document -->
                    <form action="{{ route('officier.documents.reject', $doc->id) }}" method="POST" class="flex flex-col sm:flex-row items-start gap-2">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <input type="text" name="rejection_reason" placeholder="Motif du rejet..." class="text-sm p-2 border rounded w-full max-w-xs" required value="{{ $doc->rejection_reason ?? '' }}">
                            @if($errors->has('rejection_reason'))
                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('rejection_reason') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Rejeter
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="italic text-gray-500">Aucun document soumis.</p>
    @endif
</section>

        <!-- Détails de la demande -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-6 border-b pb-2 border-gray-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Détails de la demande
            </h2>
            <ul class="space-y-2 text-gray-700">
                <li><strong>Type d'acte :</strong> <span class="font-medium">{{ $request->acte_type ?? '—' }}</span></li>
                <li><strong>Date de la demande :</strong> <span class="font-medium">{{ $request->created_at->format('d/m/Y H:i') ?? '—' }}</span></li>
                <li><strong>Statut :</strong>
                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full
                        {{ $request->status === 'approuve' ? 'bg-green-100 text-green-800' : 
                           ($request->status === 'rejete' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($request->status) ?? '—' }}
                    </span>
                </li>
                <li><strong>Observations :</strong> <span class="italic">{{ $request->rejection_reason ?? '—' }}</span></li>
            </ul>
        </section>

        <!-- Actions (Approuver / Rejeter) -->
        @if($request->status === 'en_attente')
        <section class="flex flex-col sm:flex-row gap-4 mt-8">
            <!-- Approuver -->
            <form action="{{ route('officier.requests.approve', ['id' => $request->id]) }}" method="POST" class="w-full sm:w-auto">
                @csrf
                @method('PUT')
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    🟢 Approuver la demande
                </button>
            </form>

            <!-- Rejeter -->
            <form action="{{ route('officier.requests.reject', $request->id) }}" method="POST" class="w-full sm:w-auto">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="rejection_reason" class="block text-sm font-medium text-gray-700 mb-1">
                        Motif de rejet <span class="text-red-500">*</span>
                    </label>
                    <textarea id="rejection_reason" name="rejection_reason" rows="3" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none"></textarea>
                    @error('rejection_reason')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" onclick="return confirm('Confirmer le rejet de cette demande ?')" class="w-full sm:w-auto px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                    🔴 Rejeter
                </button>
            </form>
        </section>
        @endif
    </div>
</x-officier-layout>
