<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\DummyTask;

class ToDoList extends Component
{
    public string $taskTitle = '';
    public ?DummyTask $editing;
    //public $tasks;

    protected $rules=[
        'taskTitle' => 'required|max:255',
        'editing.title' => 'required|string|min:6',
    ];

    public function mount()
    {
        //$this->tasks = DummyTask::orderBy('created_at','desc')->get();
    }

    public function render()
    {
        return view('livewire.to-do-list', [
            'tasks' => DummyTask::orderBy('completed_at', 'asc')->orderBy('created_at','desc')->get()
        ]);
    }

    public function addTask(){
        $this->validateOnly('taskTitle');

        DummyTask::create([
            'title' => $this->taskTitle
        ]);

        $this->reset('taskTitle');
    }

    public function updateTaskStatus(DummyTask $task){
        $task->completed_at = isset($task->completed_at) ? null : Carbon::now();
        $task->save();
    }

    public function deleteTask(DummyTask $task){
        $task->delete();
    }

    public function selectTaskForEdit(DummyTask $task){
        $this->editing = $task;
    }

    public function cancelEdit(){
        $this->editing = null;
    }

    public function updateTask(){
        $this->validateOnly('editing.title');

        $this->editing->save();
        $this->editing = null;
    }

}
