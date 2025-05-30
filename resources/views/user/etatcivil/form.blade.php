<x-user-layout>
    <div class="max-w-md mx-auto my-8 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            {{ isset($civilStatusRequest) ? 'Modifier la demande' : 'Nouvelle demande d\'acte' }}
        </h2>
        
        <form method="POST" action="{{ isset($civilStatusRequest) ? route('user.civil_status_requests.update', $civilStatusRequest) : route('user.civil_status_requests.store') }}" class="space-y-6">
            @csrf
            @if(isset($civilStatusRequest))
                @method('PUT')
            @endif

            <!-- Type d'acte -->
            <div>
                <label for="acte_type" class="block text-sm font-medium text-gray-700 mb-1">Type d'acte demandé</label>
                <select name="acte_type" id="acte_type" required
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm">
                    @foreach(['naissance', 'mariage', 'deces', 'divorce'] as $type)
                        <option value="{{ $type }}" {{ (isset($civilStatusRequest) && $civilStatusRequest->acte_type === $type) ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Documents à joindre -->
            <div>
                <label for="documents" class="block text-sm font-medium text-gray-700 mb-1">Documents à joindre</label>
                <select name="documents_ids[]" id="documents" multiple required
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm">
                    @foreach($userDocuments as $doc)
                        <option value="{{ $doc->id }}" 
                            {{ (isset($selectedDocuments) && in_array($doc->id, $selectedDocuments)) ? 'selected' : '' }}>
                            {{ $doc->document_type }} - {{ $doc->document_number }}
                        </option>
                    @endforeach
                </select>
                <p class="mt-1 text-sm text-gray-500">Maintenez Ctrl (Windows) ou ⌘ (Mac) pour sélectionner plusieurs documents</p>
            </div>

            <!-- Bouton de soumission -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                    {{ isset($civilStatusRequest) ? 'Mettre à jour' : 'Envoyer la demande' }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        // Amélioration du select multiple avec des tags visuels
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('documents');
            
            // Optionnel: Transformer en select2 si vous avez la librairie
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $(select).select2({
                    placeholder: "Sélectionnez des documents",
                    width: '100%'
                });
            }
        });
    </script>
    @endpush
</x-user-layout>