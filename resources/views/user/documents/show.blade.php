<x-user-layout title="Détails du document" style="documents" script="documents">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du document') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="text-lg font-medium">{{ $document->document_type }}</h3>
                            <p class="text-sm text-gray-500">Numéro: {{ $document->document_number }}</p>
                        </div>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $document->verification_status === 'approved' ? 'bg-green-100 text-green-800' : 
                               ($document->verification_status === 'rejected' ? 'bg-red-100 text-red-800' : 
                               ($document->verification_status === 'expired' ? 'bg-orange-100 text-orange-800' : 'bg-blue-100 text-blue-800')) }}">
                            {{ __(ucfirst($document->verification_status)) }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="font-medium text-gray-900">Informations du document</h4>
                            <dl class="mt-2 space-y-2">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Émis le</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $document->issue_date->format('d/m/Y') }}</dd>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Expire le</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $document->expiry_date->format('d/m/Y') }}</dd>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Autorité émettrice</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $document->issuing_authority ?? 'Non spécifié' }}</dd>
                                </div>
                                @if($document->verified_at)
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Vérifié le</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $document->verified_at->format('d/m/Y H:i') }}</dd>
                                    </div>
                                @endif
                                @if($document->rejection_reason)
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Raison du rejet</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $document->rejection_reason }}</dd>
                                    </div>
                                @endif
                            </dl>
                        </div>

                        <div>
                            <h4 class="font-medium text-gray-900">Fichiers</h4>
                            <div class="mt-2 space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Recto</p>
                                    <div class="mt-1">
                                        <a href="{{ Storage::url($document->front_path) }}" target="_blank" class="inline-flex items-center text-blue-600 hover:underline">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            Voir le fichier
                                        </a>
                                        <p class="text-xs text-gray-500 mt-1">Type: {{ $document->mime_type }}, Taille: {{ round($document->file_size / 1024, 2) }} KB</p>
                                    </div>
                                </div>
                                @if($document->back_path)
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Verso</p>
                                        <div class="mt-1">
                                            <a href="{{ Storage::url($document->back_path) }}" target="_blank" class="inline-flex items-center text-blue-600 hover:underline">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                                Voir le fichier
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-4">
                        <a href="{{ route('user.documents.index') }}" class="btn btn-secondary">
                            Retour
                        </a>
                        <a href="{{ route('user.documents.edit', $document) }}" class="btn btn-primary">
                            Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
  </div>
/</x-user-layout>