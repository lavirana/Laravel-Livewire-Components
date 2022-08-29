<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleSwitchAlert extends Component
{
    public Model $model;
    public string $field;
    public array $status = [];

    public bool $isActive;

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }
    
    public function render()
    {
        return view('livewire.toggle-switch');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        ($value == 1) ? $this->emit('successAlert', $this->status['on']) : $this->emit('errorAlert', $this->status['off']);
    }
}
