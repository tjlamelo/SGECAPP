<x-user-layout title="Mes documents" style="documents" script="documents">
    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
<div class="security-alert bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-500 rounded-lg shadow-md p-6 mb-10">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <div class="ml-4">
            <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                Informations essentielles pour la soumission de documents
            </h3>
            <div class="mt-2 text-gray-700">
                <ul class="list-disc pl-5 space-y-2">
                    <li>Tous les documents utilisés pour une demande doivent être <span class="font-semibold text-blue-700">préalablement téléversés</span> dans votre espace personnel.</li>
                    <li>Assurez-vous de fournir des pièces <span class="font-semibold text-red-600">authentiques, lisibles et valides</span>.</li>
                    <li>La validation de votre demande dépend entièrement de la qualité et de la conformité des documents fournis.</li>
                    <li>La soumission d’une demande entraîne la <span class="font-semibold">transmission automatique</span> de vos informations aux services compétents.</li>
                    <li>Tout document falsifié ou information erronée entraînera un <span class="font-semibold text-red-600">rejet immédiat</span> de la demande.</li>
                    <li>En cas de fraude ou de tentative de tromperie, des <span class="font-semibold text-red-600">sanctions légales</span> pourront être appliquées conformément à la loi en vigueur.</li>
                    <li>Un motif de rejet détaillé sera visible dans votre espace personnel, le cas échéant.</li>
                </ul>
            </div>
            <div class="mt-4 p-3 bg-blue-100 border border-blue-200 rounded-lg">
                <p class="text-sm text-blue-800 flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span>Le traitement de votre dossier prend entre <strong>5 et 10 jours ouvrables</strong>. Vous recevrez des notifications par email à chaque mise à jour du statut.</span>
                </p>
            </div>
        </div>
    </div>
</div>

            <div class="glass-header p-6 rounded-xl backdrop-blur-md bg-white/80 shadow-sm mb-8 border border-gray-100">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5">
                <div class="space-y-1">
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Mes documents</h1>
                    <p class="text-indigo-600 font-medium flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Documents sécurisés - SGEC Cameroun
                    </p>
                </div>
                <a href="{{ route('user.documents.create') }}" class="btn-primary group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform group-hover:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajouter un document
                </a>
            </div>
        </div>
    

        <!-- Liste des documents -->
        @if($documents->isEmpty())
            <!-- État vide -->
            <div class="text-center py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun document enregistré</h3>
                <p class="mt-1 text-sm text-gray-500">Commencez par ajouter votre premier document.</p>
                <div class="mt-6">
                    <a href="{{ route('user.documents.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        + Ajouter un document
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($documents as $doc)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-200">
                    <!-- En-tête de la carte -->
                    <div class="p-4 border-b border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="text-lg font-semibold text-gray-800 capitalize">{{ $doc->document_type }}</h3>
                                    <!-- Badge d'état -->
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'approved' => 'bg-green-100 text-green-800',
                                            'rejected' => 'bg-red-100 text-red-800'
                                        ];
                                        $color = $statusColors[$doc->verification_status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="text-xs px-2 py-1 rounded-full {{ $color }}">
                                        {{ ucfirst($doc->verification_status) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">N° {{ $doc->document_number ?? 'Non spécifié' }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('user.documents.show', $doc) }}" class="text-indigo-600 hover:text-indigo-800 transition-colors" title="Modifier">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('user.documents.destroy', $doc) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?')" class="text-red-500 hover:text-red-700 transition-colors" title="Supprimer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Dates et autorité -->
                        <div class="mt-4 space-y-1">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Émis le: {{ $doc->issue_date->format('d/m/Y') }}
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Expire le: {{ $doc->expiry_date->format('d/m/Y') }}
                                @if($doc->expiry_date->isPast())
                                    <span class="ml-2 px-1.5 py-0.5 text-xs rounded bg-red-100 text-red-800">Expiré</span>
                                @elseif($doc->expiry_date->diffInDays(now()) < 30)
                                    <span class="ml-2 px-1.5 py-0.5 text-xs rounded bg-yellow-100 text-yellow-800">Bientôt expiré</span>
                                @endif
                            </div>
                            @if($doc->issuing_authority)
                            <div class="flex items-center text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Émis par: {{ $doc->issuing_authority }}
                            </div>
                            @endif
                        </div>
                        
                        <!-- Raison de rejet si applicable -->
                        @if($doc->verification_status === 'rejected' && $doc->rejection_reason)
                        <div class="mt-3 p-2 bg-red-50 border border-red-100 rounded text-sm text-red-700">
                            <div class="font-medium">Raison du rejet:</div>
                            <div>{{ $doc->rejection_reason }}</div>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Prévisualisation des fichiers -->
                    <div class="p-4 bg-gray-50">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Recto
                                </p>
                                <a href="{{ asset('storage/'.$doc->front_path) }}" target="_blank" class="block group">
                                    <div class="h-32 bg-white border border-gray-200 rounded-md overflow-hidden flex items-center justify-center">
                                        <img src="{{ asset('storage/'.$doc->front_path) }}" alt="Recto du document" class="max-h-full max-w-full object-contain group-hover:opacity-90 transition-opacity">
                                    </div>
                                </a>
                            </div>
                            @if($doc->back_path)
                            <div>
                                <p class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Verso
                                </p>
                                <a href="{{ asset('storage/'.$doc->back_path) }}" target="_blank" class="block group">
                                    <div class="h-32 bg-white border border-gray-200 rounded-md overflow-hidden flex items-center justify-center">
                                        <img src="{{ asset('storage/'.$doc->back_path) }}" alt="Verso du document" class="max-h-full max-w-full object-contain group-hover:opacity-90 transition-opacity">
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-user-layout>

