<?php

namespace App\Http\Livewire;

use App\Models\WinkPost;
use Livewire\Component;

class LikeDislikeExample extends Component
{
    public function render()
    {
        return view('livewire.like-dislike-example', [
            'post' => WinkPost::oldest()->first()
        ]);
    }
}
