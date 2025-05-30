@props(['section', 'detail', 'fields'])

<form method="POST"
      action="{{ isset($isUpdate) && $isUpdate
          ? route('user.informations.update', $section)
          : route('user.informations.store', $section) }}"
      class="space-y-8"
      enctype="multipart/form-data"
      x-data="{ isSubmitting: false }"
      @submit.prevent="isSubmitting = true; $event.target.submit()">

    @csrf
    @if(isset($isUpdate) && $isUpdate)
        @method('PUT')
    @endif

    {{-- Section header avec statut dynamique --}}
    @if(isset($isUpdate) && $isUpdate)
    <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/50 to-indigo-50/50 rounded-xl transform -skew-y-1"></div>
        <div class="relative p-5 bg-white/80 backdrop-blur-sm rounded-xl shadow-sm border border-slate-200/70">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg bg-blue-50 text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-slate-700">
                        Dernière mise à jour <span class="font-semibold">{{ $detail->updated_at->diffForHumans() }}</span>
                    </p>
                </div>
                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Section complète
                </span>
            </div>
        </div>
    </div>
    @endif

    {{-- Grille responsive avec espacement optimisé --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($fields as $field)
            @php
                $name = $field['name'];
                $type = $field['type'] ?? 'text';
                $label = $field['label'] ?? ucfirst(str_replace('_', ' ', $name));
                $options = $field['options'] ?? [];
                $value = old($name, data_get($detail, $name));
                $colspan = $field['colspan'] ?? 1;
                $required = $field['required'] ?? false;
                $disabled = $field['disabled'] ?? false;
                $placeholder = $field['placeholder'] ?? '';
                $help = $field['help'] ?? null;
                $rows = $field['rows'] ?? 3;
                $error = $errors->has($name);
            @endphp

            <div class="col-span-{{ $colspan }} group">
                {{-- Label avec animation élégante --}}
                <label for="{{ $name }}" class="block mb-2">
                    <span class="text-sm font-medium text-slate-700 group-hover:text-blue-600 transition-colors duration-200">
                        {{ $label }}
                    </span>
                    @if($required)
                        <span class="text-red-500 ml-1">*</span>
                    @endif
                </label>

                {{-- Aide contextuelle avec animation --}}
                @if($help)
                    <p class="mt-1 text-xs text-slate-500 transition-all duration-200 opacity-80 group-hover:opacity-100 flex items-center">
                        <svg class="w-3 h-3 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $help }}
                    </p>
                @endif

                <div class="relative">
                    @switch($type)
                        @case('select')
                            <div class="relative">
                                <select name="{{ $name }}" id="{{ $name }}"
                                        @required($required)
                                        @disabled($disabled)
                                        class="block w-full px-4 py-3 rounded-lg border border-slate-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-colors duration-200 appearance-none
                                        {{ $error ? 'border-red-500 ring-1 ring-red-500/50' : 'border-slate-300' }}">
                                    <option value="">{{ __('Sélectionnez une option') }}</option>
                                    @foreach($options as $key => $option)
                                        <option value="{{ $key }}" @selected($value == $key)>{{ $option }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @break

                        @case('textarea')
                            <textarea name="{{ $name }}" id="{{ $name }}"
                                      rows="{{ $rows }}"
                                      placeholder="{{ $placeholder }}"
                                      @required($required)
                                      @disabled($disabled)
                                      class="block w-full px-4 py-3 rounded-lg border border-slate-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-colors duration-200
                                      {{ $error ? 'border-red-500 ring-1 ring-red-500/50' : 'border-slate-300' }}">{{ $value }}</textarea>
                            @break

                        @case('checkbox')
                            <div class="flex items-center space-x-3 mt-2">
                                <input type="hidden" name="{{ $name }}" value="0">
                                <input type="checkbox" name="{{ $name }}" id="{{ $name }}"
                                       value="1"
                                       @checked($value)
                                       @required($required)
                                       @disabled($disabled)
                                       class="h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500/50 transition duration-200">
                                <label for="{{ $name }}" class="text-sm text-slate-700">
                                    {{ $label }}
                                </label>
                            </div>
                            @break

                        @case('date')
                            <div class="relative">
                                <input type="date" name="{{ $name }}" id="{{ $name }}"
                                       value="{{ $value }}"
                                       max="{{ now()->format('Y-m-d') }}"
                                       @required($required)
                                       @disabled($disabled)
                                       class="block w-full px-4 py-3 rounded-lg border border-slate-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-colors duration-200
                                       {{ $error ? 'border-red-500 ring-1 ring-red-500/50' : 'border-slate-300' }}">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            @break

                        @case('file')
                            <div class="relative">
                                <input type="file" name="{{ $name }}" id="{{ $name }}"
                                       @required($required)
                                       @disabled($disabled)
                                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100
                                        focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500
                                        border border-slate-300 rounded-lg cursor-pointer bg-white shadow-sm
                                        {{ $error ? 'border-red-500 ring-1 ring-red-500/50' : 'border-slate-300' }}">
                            </div>
                            @break

                        @case('hidden')
                            <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                            @break

                        @default
                            <div class="relative">
                                <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
                                       value="{{ $value }}"
                                       placeholder="{{ $placeholder }}"
                                       @required($required)
                                       @disabled($disabled)
                                       @if($type === 'number') min="{{ $field['min'] ?? 0 }}" @endif
                                       class="block w-full px-4 py-3 rounded-lg border border-slate-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-colors duration-200
                                       {{ $error ? 'border-red-500 ring-1 ring-red-500/50' : 'border-slate-300' }}">
                                @if($placeholder)
                                    <label for="{{ $name }}" class="absolute left-4 top-3 text-slate-400 text-sm pointer-events-none transition-all duration-200 transform -translate-y-3 scale-75 origin-left bg-white px-1 opacity-0 group-focus-within:opacity-100 group-focus-within:translate-y-0 group-focus-within:scale-100 group-focus-within:text-blue-600">
                                        {{ $placeholder }}
                                    </label>
                                @endif
                            </div>
                    @endswitch

                    {{-- Error Icon avec animation --}}
                    @error($name)
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none animate-pulse">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @enderror
                </div>

                {{-- Error Text avec animation --}}
                @error($name)
                    <p class="mt-1 text-sm text-red-600 flex items-center transition-opacity duration-200">
                        <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        @endforeach
    </div>

    {{-- Form Actions avec micro-interactions --}}
    <div class="pt-6 flex flex-wrap gap-3 border-t border-slate-200/70">
        <button type="reset"
                class="px-4 py-2 bg-white border border-slate-300 rounded-lg shadow-sm text-sm font-medium text-slate-700 hover:bg-slate-50 hover:shadow hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500/50">
            Réinitialiser
        </button>
        <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500/50"
                :disabled="isSubmitting">
            <svg x-show="!isSubmitting" class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
            </svg>
            <svg x-show="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10"
                        stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 
                      3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span x-text="isSubmitting ? 'Enregistrement...' : 'Enregistrer'"></span>
        </button>
    </div>
</form>