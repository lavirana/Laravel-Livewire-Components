<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DeleteUser extends Component
{
    public function render()
    {
        return view('livewire.delete-user');
    }

    public function deleteUser(){
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        return redirect('/');
    }
}
