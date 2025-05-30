<x-officier-layout>
    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Liste des demandes</h1>

        @if ($requests->isEmpty())
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded shadow-md mb-6">
                <p class="text-yellow-700">Aucune demande trouvée.</p>
            </div>
        @else
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-sm uppercase tracking-wider text-left">
                        <tr>
                            <th class="px-6 py-3 font-semibold text-gray-700"># ID</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Type d'acte</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Statut</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Demandeur</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Date</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @foreach($requests as $request)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4">{{ $request->id }}</td>
                                <td class="px-6 py-4">{{ ucfirst($request->acte_type) }}</td>
                                <td class="px-6 py-4">
                                    <span class="
                                        px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $request->status === 'approuve' ? 'bg-green-100 text-green-800' : 
                                           ($request->status === 'rejete' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}
                                    ">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    {{ optional($request->user)->name ?? 'Inconnu' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $request->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('officier.requests.show', $request->id) }}" 
                                       class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir détails
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
 
        @endif
    </div>
</x-officier-layout>