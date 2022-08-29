<?php

namespace App\Http\Livewire\Examples;

use Livewire\Component;
use App\Models\DummyUser;

class ToggleSwitchExample extends Component
{
    public function render()
    {
        return view('livewire.examples.toggle-switch-example',[
            'dummyUsers' => DummyUser::all(),
        ]);
    }

}
