<x-user-layout title="Tableau de bord - Système Camerounais d'État Civil">
    <!-- Hero Section redessinée -->
    <div class="relative bg-gradient-to-r from-green-700 via-red-800 to-yellow-500 text-white py-12 px-6 shadow-2xl overflow-hidden">
        <!-- Effets de fond dynamiques -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(0,0,0,0.1)_0%,rgba(0,0,0,0)_70%)]"></div>
        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-yellow-400 rounded-full mix-blend-soft-light opacity-20"></div>
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-green-600 rounded-full mix-blend-soft-light opacity-30"></div>
        
        <div class="container mx-auto relative z-10 flex flex-col md:flex-row items-center justify-between">
            <div class="mb-8 md:mb-0 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold mb-2 tracking-tight">Tableau de bord</h1>
                <div class="inline-flex items-center bg-black/20 px-4 py-2 rounded-full mb-3">
                    <span class="mr-2 animate-pulse">👋</span>
                    <p class="text-lg opacity-95">Bienvenue, {{ auth()->user()->name }}</p>
                </div>
                <p class="text-lg max-w-2xl opacity-90 mb-4">Gérez vos demandes d'actes civils avec notre plateforme nationale sécurisée</p>
                
                <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                    <a href="{{ route('user.documents.create') }}" class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-all border border-white/30 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Ajouter un document
                    </a>
                    <a href="{{ route('user.informations.index') }}" class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-all border border-white/30 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Compléter profil
                    </a>
                </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 shadow-xl transform transition-all hover:scale-105">
                <div class="text-center">
                    <div class="bg-white/20 p-4 rounded-full w-24 h-24 flex items-center justify-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" viewBox="0 0 24 24" fill="none">
                            <path d="M4 4v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.342a2 2 0 0 0-.602-1.43l-4.44-4.342A2 2 0 0 0 14.56 2H6a2 2 0 0 0-2 2z" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M16 18H8M16 14H8M10 8H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <p class="mt-4 text-xl font-bold tracking-wider">SYSTÈME NATIONAL</p>
                    <p class="font-light opacity-90 tracking-wider">D'ÉTAT CIVIL</p>
                </div>
            </div>
        </div>
        
        <!-- Vague de séparation -->
       
    </div>

    <div class="container mx-auto px-4 py-8 -mt-6">
        <!-- Boutons d'actions rapides -->
        <div class="flex flex-wrap justify-center gap-5 mb-10">
            <a href="{{ route('user.civil_status_requests.store') }}" class="group relative flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 text-white font-bold rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:from-green-700 hover:to-green-800 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_#fff_0%,_transparent_70%)] opacity-0 group-hover:opacity-20 transition-opacity"></div>
                <svg class="w-6 h-6 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouvelle Demande
            </a>

            @if(auth()->user()->role->value === 'agent_etat_civil')
            <a href="{{ route('officier.index') }}" class="group relative flex items-center px-8 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-bold rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:from-yellow-600 hover:to-yellow-700 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_#000_0%,_transparent_70%)] opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <svg class="w-6 h-6 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Espace Agent
            </a>
            @endif
            
            @if(auth()->user()->role->value === 'admin')
            <a href="{{ route('admin.index') }}" class="group relative flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-bold rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:from-purple-700 hover:to-purple-800 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_#fff_0%,_transparent_70%)] opacity-0 group-hover:opacity-20 transition-opacity"></div>
                <svg class="w-6 h-6 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Espace Admin
            </a>
            @endif
        </div>

        <!-- Section Statistiques -->
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200 flex items-center">
                <svg class="w-6 h-6 mr-2 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Tableau de Statistiques
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Taux de complétion -->
                <div class="bg-gradient-to-br from-blue-50 to-white p-5 rounded-2xl shadow-lg border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-semibold text-blue-700">Taux de complétion</span>
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-extrabold text-blue-800">{{ $completionPercentage }}%</p>
                        <div class="w-16 h-16">
                            <svg viewBox="0 0 36 36" class="circular-chart">
                                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path class="circle" stroke-dasharray="{{ $completionPercentage }},100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <text x="18" y="20.5" class="percentage">{{ $completionPercentage }}%</text>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Demandes -->
                <div class="bg-white p-5 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-gray-600">Total Demandes</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalRequests }}</p>
                    </div>
                    
                    <div class="bg-green-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-green-700">Validées</span>
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-green-800">{{ $validatedRequests }}</p>
                    </div>
                    
                    <div class="bg-red-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-red-700">Refusées</span>
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-red-800">{{ $refusedRequests }}</p>
                    </div>
                    
                    <div class="bg-yellow-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-yellow-700">En attente</span>
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-yellow-800">{{ $pendingRequests }}</p>
                    </div>
                </div>
                
                <!-- Documents -->
                <div class="bg-white p-5 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-gray-600">Documents</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16h10M7 8h10m0 0v10M7 8v10" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalDocuments }}</p>
                    </div>
                    
                    <div class="bg-green-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-green-700">Validés</span>
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-green-800">{{ $validatedDocuments }}</p>
                    </div>
                    
                    <div class="bg-red-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-red-700">Refusés</span>
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-red-800">{{ $refusedDocuments }}</p>
                    </div>
                    
                    <div class="bg-yellow-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-yellow-700">En attente</span>
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-yellow-800">{{ $pendingDocuments }}</p>
                    </div>
                </div>
                
                <!-- Progression -->
                <div class="bg-gradient-to-br from-indigo-50 to-white p-5 rounded-2xl shadow-lg border border-indigo-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-semibold text-indigo-700">Votre progression</span>
                        <div class="bg-indigo-100 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Profil complet</span>
                                <span>{{ min($completionPercentage, 100) }}%</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-indigo-600 rounded-full" style="width: {{ $completionPercentage }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Documents vérifiés</span>
                                <span>{{ $totalDocuments > 0 ? round(($validatedDocuments/$totalDocuments)*100) : 0 }}%</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-green-500 rounded-full" style="width: {{ $totalDocuments > 0 ? ($validatedDocuments/$totalDocuments)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Demandes traitées</span>
                                <span>{{ $totalRequests > 0 ? round((($validatedRequests+$refusedRequests)/$totalRequests)*100) : 0 }}%</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-500 rounded-full" style="width: {{ $totalRequests > 0 ? (($validatedRequests+$refusedRequests)/$totalRequests)*100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Derniers documents -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-10 border border-gray-100">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Mes derniers documents
                </h2>
                <a href="{{ route('user.documents.index') }}" class="text-sm font-medium text-green-700 hover:text-green-800 flex items-center">
                    Voir tout
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="divide-y divide-gray-100">
                @forelse($documents as $doc)
                <div class="px-6 py-4 hover:bg-gray-50/50 transition-all duration-200 flex justify-between items-center group">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-blue-100 text-blue-600 mr-4 transition-all group-hover:rotate-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-md font-semibold text-gray-800">{{ $doc->document_type }}</h3>
                            <div class="flex items-center text-xs text-gray-500 mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Ajouté le {{ $doc->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.documents.edit', $doc) }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-green-100 hover:text-green-800 transition-all flex items-center">
                        <span>Voir</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                @empty
                <div class="px-6 py-8 text-center">
                    <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">Aucun document disponible</h3>
                    <p class="text-gray-500">Commencez par ajouter vos documents administratifs</p>
                </div>
                @endforelse
            </div>
            
            <div class="px-6 py-4 bg-gray-50 text-center border-t border-gray-100">
                <a href="{{ route('user.documents.create') }}" class="inline-flex items-center text-green-700 hover:text-green-800 font-medium group">
                    <svg class="w-5 h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajouter un nouveau document
                </a>
            </div>
        </div>
    </div>

    <style>
        .circular-chart {
            display: block;
        }
        .circular-chart .circle-bg {
            fill: none;
            stroke: #e6e6e6;
            stroke-width: 3.8;
        }
        .circular-chart .circle {
            fill: none;
            stroke-width: 2.8;
            stroke-linecap: round;
            stroke: #3b82f6;
            animation: progress 1s ease-out forwards;
        }
        .circular-chart .percentage {
            fill: #1e40af;
            font-size: 0.4em;
            font-weight: bold;
            text-anchor: middle;
        }
        @keyframes progress {
            0% { stroke-dasharray: 0 100; }
        }
    </style>
</x-user-layout>