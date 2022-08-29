<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use \Actuallymab\LaravelComment\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentPro extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';

    
    public Model $model;
    public $user;
    public string $newComment = '';
    public string $replyComment = '';
    public ?Comment $replyTo;
    public string $view = 'comment-pro';
    public $deleteId;

    protected $listeners = ['replyAdded' => '$refresh', 'deleteComment' => 'confirmDelete'];

    protected $rules = [
        'newComment' => 'required|min:6',
        'replyComment' => 'required|min:6',
    ];
    
    public function render()
    {
        return view('livewire.'.$this->view, [
            'comments' => $this->model->comments()->latest()->paginate(6),
        ]);
    }

    public function mount(){
        
        $this->user = Auth::user();
    }

    public function postComment(){

        if(!Auth::check())
            return;

        $this->validateOnly('newComment');

        $this->user->comment($this->model, $this->newComment);

        $this->reset('newComment');

        $this->model = $this->model->refresh();

    }

    public function replyComment(){
        if(!Auth::check())
            return;

        $this->validateOnly('replyComment');

        $this->user->comment($this->replyTo, $this->replyComment);

        $this->reset('replyComment');

        $this->emit('replyAdded');

        $this->replyTo = null;
    }

    public function refreshModel()
    {
        $this->model = $this->model->refresh();
    }

    public function selectCommentToReply(Comment $comment){
        $this->replyTo = $comment;
    }

    public function cancelReply(Comment $comment){
        $this->replyTo = null;
    }

    public function confirmDelete(){

       if(!isset($this->deleteId))
          return; 

       $commentToDelete = Comment::find($this->deleteId);

       if (! Gate::allows('delete-comment', $commentToDelete)) {
            abort(403);
        }
       
       $commentToDelete->delete();

       $this->deleteId = null;
    }

    public function setDeleteId($Id){
        $this->deleteId = $Id;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

}
