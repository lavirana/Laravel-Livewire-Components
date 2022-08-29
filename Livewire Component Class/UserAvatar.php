<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserAvatar extends Component
{
    use WithFileUploads;

    public $user;
    public $avatar;
    
    public function render()
    {
        return view('livewire.user-avatar');
    }

    public function mount(){
        $this->user = Auth::user();
    }

    public function changeAvatar(){
        if($this->avatar){
            $this->user->avatar = $this->avatar->store('/', 's3-avatars');
            $this->user->save();
            $this->emit('successAlert', 'Avatar Saved !');
            $this->avatar = null;
        }
    }

}
