<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WinkPost;

class LikeButtonExample extends Component
{
    public function render()
    {
        return view('livewire.like-button-example',[
            'post' => WinkPost::oldest()->first()
        ]);
    }
}
