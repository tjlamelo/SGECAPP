
<x-user-layout :currentSection="$currentSection" title="Mes Informations - {{ $currentSection ? ucfirst($currentSection) : 'Tableau de bord' }}" class="bg-gradient-to-br from-slate-50 to-white">
   
    <div class="container max-w-7xl mx-auto px-4 py-6 md:px-8 md:py-10 space-y-10">

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
                Informations importantes sur l'inscription de vos données personnelles
            </h3>
            <div class="mt-2 text-gray-700">
                <ul class="list-disc pl-5 space-y-2">
                    <li>Les informations que vous inscrivez doivent être <span class="font-semibold text-blue-700">exhaustives, exactes et vérifiables</span>.</li>
                    <li>La <span class="font-semibold text-red-600">véracité de vos données personnelles</span> est essentielle pour la validité de toute demande ultérieure.</li>
                    <li>Il est vivement recommandé de <span class="font-semibold">joindre des documents officiels</span> (actes, pièces d’identité, justificatifs) pour appuyer les informations saisies.</li>
                    <li>Les pièces fournies peuvent servir à <span class="font-semibold">corroborer les informations</span> inscrites, notamment lors du traitement de vos dossiers.</li>
                    <li>En cas d’incohérence, d’information inexacte ou de suspicion de fraude, <span class="font-semibold text-red-600">votre profil pourra être suspendu ou rejeté</span>.</li>
                    <li>Toute tentative de falsification entraînera des <span class="font-semibold text-red-600">poursuites judiciaires</span> conformément à la législation en vigueur.</li>
                </ul>
            </div>
            <div class="mt-4 p-3 bg-blue-100 border border-blue-200 rounded-lg">
                <p class="text-sm text-blue-800 flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span>Assurez-vous de mettre à jour vos informations en cas de changement. Des documents à jour peuvent être exigés pour confirmer l'exactitude des données déclarées.</span>
                </p>
            </div>
        </div>
    </div>
</div>

        {{-- En-tête élégant avec navigation adaptative --}}
        <header class="flex flex-wrap gap-5 justify-between items-start md:items-center">
            <div class="space-y-2">
                <h1 class="text-4xl font-bold text-slate-900 tracking-tight flex items-center">
                    <svg class="w-8 h-8 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Mon Profil Personnel
                </h1>
                <p class="text-slate-500 text-sm flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Gestion et mise à jour de vos informations sensibles
                </p>
            </div>

            @if($currentSection)
            <a href="{{ route('user.informations.index') }}" 
               class="group relative inline-flex items-center px-5 py-2.5 rounded-xl bg-white/80 backdrop-blur-sm border border-slate-200 hover:border-slate-300 hover:shadow-md transition-all duration-300 shadow-sm font-medium text-slate-700 hover:text-slate-900 transform hover:-translate-x-1">
                <svg class="w-4 h-4 mr-2 text-slate-500 group-hover:text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour au panorama
            </a>
            @endif
        </header>

        <div class="flex items-center space-x-3">
            <span class="text-sm font-medium text-slate-600">Complétion globale du profil :</span>
            <div class="w-full max-w-xs bg-slate-200 rounded-full h-2.5">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2.5 rounded-full" style="width: {{ $completionPercentage }}%"></div>
            </div>
            <span class="text-sm font-bold text-slate-800">{{ $completionPercentage }}%</span>
        </div>

        {{-- Feedback visuel amélioré --}}
        @if(session('success'))
        <div class="relative p-4 pl-12 rounded-xl bg-emerald-50/80 border border-emerald-100 text-emerald-700 shadow-sm backdrop-blur-sm animate-fade-in">
            <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-xl bg-gradient-to-b from-emerald-400 to-emerald-600"></div>
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 flex-shrink-0 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif

        {{-- Navigation raffinée avec micro-interactions --}}
        <nav class="border-b border-slate-200/60 pb-1">
            <ul class="flex space-x-1 overflow-x-auto pb-0.5 scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                @foreach($sections as $section)
                <li class="relative flex-shrink-0">
                    <a href="{{ route('user.informations.edit', $section) }}" 
                       class="group inline-flex items-center space-x-2 px-4 py-3 font-medium rounded-t-lg transition-all duration-200
                        {{ $currentSection === $section 
                            ? 'text-blue-700 bg-white/80 border-b-2 border-blue-500 shadow-sm' 
                            : 'text-slate-600 hover:text-blue-600 hover:bg-blue-50/50' }}">
                        
                        <span class="transition-transform duration-200 group-hover:translate-x-1">{{ ucfirst($section) }}</span>
                        @php
                        $completion = $completionPercentages[$section] ?? 0;
                        @endphp
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full text-xs font-medium
                            {{ $completion == 100 ? 'bg-emerald-100 text-emerald-700' : 
                               ($completion > 0 ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700') }}">
                            @if($completion == 100)
                                ✅
                            @elseif($completion > 0)
                                {{ $completion }}%
                            @else
                                –
                            @endif
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
        </nav>

        {{-- Carte principale interactive avec effet de profondeur --}}
        <div class="bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl overflow-hidden border border-slate-100/50">
            @if($currentSection)
            {{-- En-tête de section sophistiqué --}}
            <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row items-start md:items-center justify-between space-y-3 md:space-y-0">
                <div class="space-y-1">
                    <h2 class="text-xl font-semibold text-slate-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ ucfirst($currentSection) }}
                    </h2>
                    @if($detail->exists)
                    <p class="text-sm text-slate-500 italic flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Actualisé {{ $detail->updated_at->diffForHumans() }}
                    </p>
                    @endif
                </div>
                
                <div class="flex space-x-3">
                    @if($detail->exists)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Complet
                    </span>
                    @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        À compléter
                    </span>
                    @endif
                </div>
            </div>

            {{-- Formulaire dynamique avec card dégradé --}}
            <div class="p-6 space-y-8 bg-gradient-to-br from-slate-50/50 to-white">
                <x-form.form-section :section="$currentSection" :detail="$detail" :fields="$fields" />
            </div>
            @else
            {{-- État vide engageant avec animation 3D --}}
            <div class="p-12 text-center animate-fade-in">
                <div class="mx-auto max-w-md space-y-6 transform transition-all hover:scale-105">
                    <div class="inline-flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-5 shadow-inner">
                        <svg class="h-14 w-14 text-blue-400/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <h3 class="text-xl font-bold text-slate-900 tracking-tight">
                            Personnalisez votre expérience
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Sélectionnez une catégorie ci-dessus pour accéder aux paramètres détaillés<br>
                            et optimiser votre expérience personnalisée avec des animations fluides
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <div class="animate-bounce">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- Design system cohérent avec micro-interactions modernes --}}
    @push('styles')
    <style>
        .alert-success {
            @apply p-4 rounded-xl bg-emerald-50/80 border border-emerald-100 text-emerald-700 shadow-sm backdrop-blur-sm;
        }
        
        .btn-secondary {
            @apply inline-flex items-center px-4 py-2.5 border border-slate-200 rounded-lg font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all shadow-sm hover:shadow-md focus:ring-2 focus:ring-blue-500 focus:ring-offset-1;
        }
        
        .badge {
            @apply px-3 py-1 rounded-full text-sm font-medium;
        }
        
        .badge-success {
            @apply bg-emerald-100 text-emerald-700;
        }
        
        .badge-info {
            @apply bg-blue-100 text-blue-700;
        }
        
        .badge-warning {
            @apply bg-amber-100 text-amber-700;
        }
        
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
        
        /* Personnalisation de la scrollbar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        
        /* Effets de parallaxe subtils */
        .hover\\:parallax:hover {
            transform: translateY(-2px);
        }
    </style>
    @endpush
</x-user-layout>