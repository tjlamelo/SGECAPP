<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = '', public string $style = '', public string $script = '',   public ?string $currentSection = null)
    {
        $this->title = config('app.name') . ($title ? '-' . $title : '');
        //$this->style = $style ? $style : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-layout', [
            'currentSection' => $this->currentSection,
            'title' => $this->title,
            'style' => $this->style,
            'script' => $this->script,
        ]);
    }
}
