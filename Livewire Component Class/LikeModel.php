<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class LikeModel extends Component
{

    public Model $model;
    public $likesCount;
    public $isLiked;

    

    public function mount(){
        $reactantFacade = $this->model->viaLoveReactant();
        $this->likesCount =  isset($reactantFacade->getReactionCounterOfType('Like')->count) ? $reactantFacade->getReactionCounterOfType('Like')->count : 0;
        $this->isLiked = $reactantFacade->isReactedBy(Auth::user());
    }

    public function render()
    {
        return view('livewire.like-model');
    }

    public function like(){

        if(!Auth::check())
            return false;

        $reacterFacade = Auth::user()->viaLoveReacter();
        $reacterFacade->reactTo($this->model, 'Like');

        $this->likesCount++;
        $this->isLiked = true;

    }

    public function unlike(){

        if(!Auth::check())
            return false;

        $reacterFacade = Auth::user()->viaLoveReacter();
        $reacterFacade->unreactTo($this->model, 'Like');

        $this->likesCount--;
        $this->isLiked = false;

    }

 

}
