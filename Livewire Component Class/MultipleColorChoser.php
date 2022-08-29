<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MultipleColorChoser extends Component
{
    public array $colorOptions = ['blue', 'red', 'pink', 'yellow', 'orange', 'dark', 'green', 'purple', 'white'];

    public $colors = [];

    public function render()
    {
        return view('livewire.multiple-color-choser');
    }

    public function clearColors(){
        $this->colors = [];
    }
}
