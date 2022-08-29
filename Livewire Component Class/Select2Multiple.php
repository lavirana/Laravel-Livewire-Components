<?php

namespace App\Http\Livewire;

use App\Models\DummyTask;
use Livewire\Component;

class Select2Multiple extends Component
{
    public $tasks = [];
    public $selectedTasks = [];

    public function render()
    {
        return view('livewire.select2-multiple');
    }

    public function mount(){
        $this->tasks = DummyTask::all();
    }
}
