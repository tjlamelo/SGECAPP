<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $section,
        public mixed $detail,
        public array $fields
    ) {
        // Initialisation des propriétés via les paramètres du constructeur
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form-section');
    }
}