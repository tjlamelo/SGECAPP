<x-user-layout title=" " style="documents" script="documents">
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-6 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{ isset($document) ? 'Modifier le document' : 'Ajouter un document' }}
                    </h3>
                </div>
                
                <div class="px-6 py-6 space-y-6">
                    <form action="{{ isset($document) ? route('user.documents.update', $document) : route('user.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($document))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Document Type -->
                            <div class="sm:col-span-2">
                                <label for="document_type" class="block text-sm font-medium text-gray-700">Type de document</label>
                                <select id="document_type" name="document_type" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm">
                                    @foreach ($documentTypes as $type)
                                    <option value="{{ $type }}" {{ old('document_type', $document->document_type ?? '') == $type ? 'selected' : '' }}>
                                        {{ str_replace('_', ' ', $type) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Document Number -->
                            <div>
                                <label for="document_number" class="block text-sm font-medium text-gray-700">Numéro</label>
                                <input type="text" id="document_number" name="document_number" value="{{ old('document_number', $document->document_number ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Issuing Authority -->
                            <div>
                                <label for="issuing_authority" class="block text-sm font-medium text-gray-700">Autorité émettrice</label>
                                <input type="text" id="issuing_authority" name="issuing_authority" value="{{ old('issuing_authority', $document->issuing_authority ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Issue Date -->
                            <div>
                                <label for="issue_date" class="block text-sm font-medium text-gray-700">Date de délivrance</label>
                                <input type="date" id="issue_date" name="issue_date" value="{{ old('issue_date', isset($document->issue_date) ? $document->issue_date->format('Y-m-d') : '') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Expiry Date -->
                            <div>
                                <label for="expiry_date" class="block text-sm font-medium text-gray-700">Date d'expiration</label>
                                <input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', isset($document->expiry_date) ? $document->expiry_date->format('Y-m-d') : '') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <!-- File Uploads -->
                        <div class="space-y-4">
                            <!-- Front File -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Fichier recto (PDF/JPG/PNG)</label>
                                <div class="mt-1 flex flex-col sm:flex-row items-start sm:items-center gap-3">
                                    <input type="file" name="front_file" {{ !isset($document) ? 'required' : '' }} class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    @if(isset($document) && $document->front_path)
                                    <span class="text-sm text-gray-500">
                                        <a href="{{ asset('storage/'.$document->front_path) }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Voir le fichier
                                        </a>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Back File -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Fichier verso (PDF/JPG/PNG)</label>
                                <div class="mt-1 flex flex-col sm:flex-row items-start sm:items-center gap-3">
                                    <input type="file" name="back_file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    @if(isset($document) && $document->back_path)
                                    <span class="text-sm text-gray-500">
                                        <a href="{{ asset('storage/'.$document->front_path) }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Voir le fichier
                                        </a>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                                {{ isset($document) ? 'Mettre à jour' : 'Enregistrer' }}
                                <svg class="ml-2 -mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>