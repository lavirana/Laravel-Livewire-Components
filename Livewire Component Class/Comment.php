<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    
    public Model $model;
    public $user;
    public string $newComment = '';

    protected $rules = [
        'newComment' => 'required|min:6',
    ];
    
    public function render()
    {
        return view('livewire.comment', [
            'comments' => $this->model->comments()->latest()->paginate(6),
        ]);
    }

    public function mount(){
        
        $this->user = Auth::user();
    }

    public function postComment(){

        if(!Auth::check())
            return;

        $this->validate();

        $this->user->comment($this->model, $this->newComment);

        $this->reset('newComment');

        $this->model = $this->model->refresh();

    }

}
