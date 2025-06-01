<x-user-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

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
                        Consignes importantes pour les demandes d'actes d'état civil
                    </h3>
                    <div class="mt-2 text-gray-700">
                        <ul class="list-disc pl-5 space-y-2">
                            <li class="font-medium">Toute demande doit être constituée <span class="text-blue-600">exclusivement</span> à partir des documents préalablement uploadés dans votre compte</li>
                            <li>Vous devez vous assurer de <span class="font-semibold text-red-600">l'authenticité et de la validité</span> des documents fournis</li>
                            <li>La soumission d'une demande entraîne la transmission <span class="font-semibold">automatique</span> de toutes vos informations personnelles aux services compétents</li>
                            <li>Toute information erronée ou document falsifié entraînera le <span class="font-semibold text-red-600">rejet immédiat</span> de votre demande</li>
                            <li>En cas de documents non conformes ou de suspicion de fraude, des <span class="font-semibold text-red-600">poursuites judiciaires</span> pourront être engagées conformément à la loi camerounaise</li>
                            <li>L'officier d'état civil peut rejeter votre demande en indiquant la raison précise du rejet dans votre espace personnel</li>
                        </ul>
                    </div>
                    <div class="mt-4 p-3 bg-blue-100 border border-blue-200 rounded-lg">
                        <p class="text-sm text-blue-800 flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span>Votre demande sera traitée dans un délai de 5 à 10 jours ouvrables. Vous serez notifié par email à chaque étape de l'avancement de votre dossier.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header with title and action button -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Mes demandes d'actes d'état civil</h1>
                <p class="text-sm text-gray-500 mt-1">Historique de toutes vos demandes</p>
            </div>
            <a href="{{ route('user.civil_status_requests.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouvelle demande
            </a>
        </div>

        <!-- Request cards -->
        <div class="space-y-4">
            @foreach($requests as $request)
            <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                        <!-- Request details -->
                        <div class="flex-1 space-y-3">
                            <!-- Request header -->
                            <div class="flex items-center gap-3">
                                <h2 class="text-lg font-semibold text-gray-800 capitalize">
                                    Acte de {{ $request->acte_type }}
                                </h2>
                                <!-- Status badge -->
                                @php
                                    $statusColors = [
                                        'en_attente' => 'bg-yellow-100 text-yellow-800',
                                        'approuve' => 'bg-green-100 text-green-800',
                                        'rejete' => 'bg-red-100 text-red-800'
                                    ];
                                    $color = $statusColors[$request->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $color }}">
                                    {{ str_replace('_', ' ', ucfirst($request->status)) }}
                                </span>
                            </div>

                            <!-- Request metadata -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Soumis le {{ $request->created_at->format('d/m/Y à H:i') }}
                                </div>
                                
                                @if($request->status === 'rejete' && $request->rejection_reason)
                                <div class="sm:col-span-2">
                                    <div class="flex items-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-red-600"><strong>Motif :</strong> {{ $request->rejection_reason }}</span>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Documents list -->
                            <div class="mt-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-2">Documents associés</h3>
                                @php
                                    $docIds = json_decode($request->documents_ids, true) ?? [];
                                    $documents = App\Models\UserDocument::whereIn('id', $docIds)->get();
                                @endphp
                                
                                @if($documents->count() > 0)
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                    @foreach($documents as $document)
                                    <li class="flex items-center p-2 bg-gray-50 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span class="truncate">{{ $document->document_type }} - {{ $document->document_number }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p class="text-sm text-gray-500 italic">Aucun document associé</p>
                                @endif
                            </div>
                        </div>
<a href="{{ route('user.civil_status_requests.show', $request->id) }}" 
   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2"
   title="Voir le détail">
    Voir
</a>

                  <div class="flex flex-col sm:flex-row md:flex-col gap-2">
    @if($request->status === 'en_attente')
    <a href="{{ route('user.civil_status_requests.edit', $request->id) }}" 
       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
      Modifier
    </a>
    <form method="POST" action="{{ route('user.civil_status_requests.destroy', $request->id) }}" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" 
                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')"
                class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
          Supprimer  
        </button>
    </form>
    @endif

    @if($request->status === 'approuve')
    <a href="{{ route('user.civil_status_requests.generate', $request->id) }}" target="_blank"
       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
       title="Voir / Télécharger le PDF">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Télécharger PDF
    </a>
    @endif
</div>

                    </div>
                </div>
            </div>
            @endforeach

            @if($requests->isEmpty())
            <div class="text-center py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune demande trouvée</h3>
                <p class="mt-1 text-sm text-gray-500">Commencez par créer votre première demande.</p>
                <div class="mt-6">
                    <a href="{{ route('user.civil_status_requests.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Nouvelle demande
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-user-layout>