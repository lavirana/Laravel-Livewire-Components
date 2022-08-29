<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public string $currentPassword = '';
    public string $newPassword = '';
    public string $newPassword_confirmation = '';

    public function render()
    {
        return view('livewire.change-password');
    }

    protected $rules = [
        'currentPassword' => 'required',
        'newPassword' => 'required|string|min:6|confirmed',
    ];

    public function updatePassword(){
        $this->validate();

        if (!(Hash::check($this->currentPassword, Auth::user()->password))) {
            // The passwords matches
            session()->flash('error', 'Your current password does not match.');
        }
        
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($this->newPassword);
        $user->save();

        session()->flash('success', 'Password updated successfully.');

        $this->reset();
    }
}
