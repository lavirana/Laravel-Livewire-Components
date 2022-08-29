<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class LikeDislikeModel extends Component
{
    public Model $model;
    public $LikeCount;
    public $DislikeCount;
    public $isLikeByUser;
    public $isDislikeByUser;

    public function render()
    {
        return view('livewire.like-dislike-model');
    }

    public function mount(){
        $reactantFacade = $this->model->viaLoveReactant();
        $this->LikeCount =  isset($reactantFacade->getReactionCounterOfType('Like')->count) ? $reactantFacade->getReactionCounterOfType('Like')->count : 0;
        $this->DislikeCount =  isset($reactantFacade->getReactionCounterOfType('Dislike')->count) ? $reactantFacade->getReactionCounterOfType('Dislike')->count : 0;
        $this->isLikeByUser = $reactantFacade->isReactedBy(Auth::user(), 'Like');
        $this->isDislikeByUser = $reactantFacade->isReactedBy(Auth::user(), 'Dislike');
    }

    public function like(){
        if(!Auth::check())
            return false;

        $reacterFacade = Auth::user()->viaLoveReacter();

        if(!$this->isLikeByUser){

            if($this->isDislikeByUser) //Remove dislike if already exist
                $this->dislike();

            $reacterFacade->reactTo($this->model, 'Like');
            $this->LikeCount++;
            $this->isLikeByUser = true;
        }else {
            $reacterFacade->unreactTo($this->model, 'Like');
            $this->LikeCount--;
            $this->isLikeByUser = false;
        }     
    }

    public function dislike(){
        if(!Auth::check())
            return false;

        $reacterFacade = Auth::user()->viaLoveReacter();

        if(!$this->isDislikeByUser){

            if($this->isLikeByUser) //Remove like if already exist
                $this->like();

            $reacterFacade->reactTo($this->model, 'Dislike');
            $this->DislikeCount++;
            $this->isDislikeByUser = true;
        }else {
            $reacterFacade->unreactTo($this->model, 'Dislike');
            $this->DislikeCount--;
            $this->isDislikeByUser = false;
        }     
    }
}
