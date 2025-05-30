<x-user-layout>
    {{-- user.etatcivil.show --}}
    <div class="max-w-4xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">
            Détails de la demande d'acte : {{ ucfirst($demande->acte_type) }}
        </h1>

        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 bg-gray-100">Champ</th>
                    <th class="border border-gray-300 px-4 py-2 bg-gray-100">Valeur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $field)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $field['label'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @php
                                $fieldName = $field['name'];
                                $value = $userDetails ? ($userDetails->$fieldName ?? 'Non renseigné') : 'Non renseigné';
                            @endphp
                            {{ $value }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Affichage des documents --}}
        @if ($documents->isNotEmpty())
            <div class="mt-10">
                <h2 class="text-xl font-semibold mb-4">Documents associés</h2>
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Type</th>
                            <th class="border px-4 py-2 bg-gray-100">Numéro</th>
                            <th class="border px-4 py-2 bg-gray-100">Délivré le</th>
                            <th class="border px-4 py-2 bg-gray-100">Expire le</th>
                            <th class="border px-4 py-2 bg-gray-100">État</th>
                            <th class="border px-4 py-2 bg-gray-100">Pièces</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $doc)
                            <tr>
                                <td class="border px-4 py-2">{{ $doc->document_type }}</td>
                                <td class="border px-4 py-2">{{ $doc->document_number }}</td>
                                <td class="border px-4 py-2">{{ optional($doc->issue_date)->format('d/m/Y') ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ optional($doc->expiry_date)->format('d/m/Y') ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">
                                    @if ($doc->verification_status === 'verifie')
                                        ✅ Vérifié
                                    @elseif ($doc->verification_status === 'rejete')
                                        ❌ Rejeté : {{ $doc->rejection_reason }}
                                    @else
                                        ⏳ En attente
                                    @endif
                                </td>
                                <td class="border px-4 py-2 space-x-2">
                                    @if ($doc->front_path)
                                        <a href="{{ asset('storage/' . $doc->front_path) }}" target="_blank" class="text-blue-600 underline">Recto</a>
                                    @endif
                                    @if ($doc->back_path)
                                        <a href="{{ asset('storage/' . $doc->back_path) }}" target="_blank" class="text-blue-600 underline">Verso</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- Motif de rejet de la demande --}}
        @if ($demande->status === 'rejete' && $demande->rejection_reason)
            <div class="mt-6 p-4 bg-red-100 text-red-700 rounded">
                <strong>Motif du rejet :</strong> {{ $demande->rejection_reason }}
            </div>
        @endif

        {{-- Lien de retour --}}
        <div class="mt-6">
            <a href="{{ route('civil_status_requests.index') }}" class="text-blue-600 hover:underline">
                ← Retour à la liste des demandes
            </a>
        </div>
    </div>
</x-user-layout>
