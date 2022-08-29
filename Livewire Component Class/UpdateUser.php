<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class UpdateUser extends Component
{

    use WithFileUploads;

    public $user;
    public string $name;
    public $avatar;

    public function mount(){
        $this->user = Auth::user();
        $this->name = Auth::user()->name;
    }

    public function updateUserInfo(){

        $this->user->name = $this->name;

        if($this->avatar){
            $this->user->avatar = $this->avatar->store('/', 's3-avatars');
        }
        
        if($this->user->isDirty('name') || $this->user->isDirty('avatar')){
            $this->user->save();
            $this->emit('successAlert', 'Changes Saved !');
        }else{
            $this->emit('errorAlert', 'Oops! You made no changes');
        }

    }


    public function render()
    {
        return view('livewire.update-user');
    }
}
