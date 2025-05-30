{{-- resources/views/user/informations/form.blade.php --}}
<x-user-layout title="{{ ucfirst($section) }} - Mes Informations">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">

        {{-- En-tête --}}
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">
                {{ $detail->exists ? 'Modifier' : 'Ajouter' }} les informations de {{ ucfirst($section) }}
            </h1>
            
            <a href="{{ route('user.informations.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                ← Retour au tableau de bord
            </a>
        </div>

        {{-- Notification de succès --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 text-green-700 text-sm rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulaire générique --}}
        <x-form.form-section 
            :section="$section"
            :detail="$detail"
            :fields="$fields"
        />

        {{-- Alerte informative pour certaines sections --}}
        @if(in_array($section, ['naissance', 'deces']))
            <div class="mt-8 p-4 bg-blue-50 border-l-4 border-blue-400 text-sm text-gray-700 rounded">
                ℹ️ Les champs marqués d'un astérisque (*) sont obligatoires pour la validation légale de l'acte.
            </div>
        @endif

    </div>

    {{-- Si besoin de styles spécifiques --}}
    @push('styles')
    <style>
        /* Exemple de style personnalisé si besoin */
    </style>
    @endpush
</x-user-layout>
