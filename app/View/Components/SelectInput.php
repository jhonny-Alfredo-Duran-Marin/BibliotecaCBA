<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInput extends Component
{
    public $items; // Datos a mostrar en el select
    public $name;  // Nombre del select
    public $selected; // Valor preseleccionado (opcional)

    /**
     * Crear una nueva instancia del componente.
     *
     * @param array $items
     * @param string $name
     * @param mixed $selected
     */
    /**
     * Create a new component instance.
     */
    public function __construct($items, $name, $selected = null)
    {
        $this->items = $items;
        $this->name = $name;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-input');
    }
}
