<?php

namespace App\Http\Livewire\Examples;

use Livewire\Component;
use App\Models\DummyUser;

class ToggleSwitchAlertExample extends Component
{
    public function render()
    {
        return view('livewire.examples.toggle-switch-alert-example',[
            'dummyUsers' => DummyUser::all(),
        ]);
    }
}
