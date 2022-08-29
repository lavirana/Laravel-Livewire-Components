<div>
    <div class="row justify-content-center my-3">
        <div class="col-md-10 bg-white border shadow py-3 px-5">
            <div class="fw-bold fs-5 text-indigo my-3">Awesome ToDo List</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-2 @error('taskTitle') is-invalid @enderror" wire:keydown.enter="addTask" placeholder="Whats needs to be done?" aria-label="taskTitle" wire:model="taskTitle">
                        <button class="btn bg-indigo text-white px-3 float-end" wire:click="addTask">Add</button>
                        @error('taskTitle')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group list-group-flush">
                        @foreach($tasks as $task)
                        <li class="list-group-item" :wire:key="'task-details-'.$task->id">
                            <div class="d-flex justify-content-between align-items-end">
                                @if(isset($editing) && $editing->id == $task->id)
                                <div class="form-group flex-fill">
                                    <input wire:key="editField" type="text" wire:keydown.enter="updateTask" class="form-control @error('editing.title') is-invalid @enderror" wire:model="editing.title"/>
                                    @error('editing.title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="ms-3">
                                    <i class="fas fa-save text-success cursor-pointer me-1" wire:click="updateTask()"></i>
                                    <i class="fas fa-window-close text-secondary cursor-pointer" wire:click="cancelEdit()"></i>
                                </div>
                                @else
                                <div>
                                    <input class="form-check-input me-1 p-2 align-sub" type="checkbox" {{isset($task->completed_at) ? 'checked' : ''}} value="1" wire:click="updateTaskStatus({{ $task->id }})">
                                    <span class="{{isset($task->completed_at) ? 'text-decoration-line-through' : ''}}">{{$task->title}}</span>
                                </div>
                                <div>
                                    <i class="fas fa-edit text-orange cursor-pointer me-1" wire:click="selectTaskForEdit({{ $task->id }})"></i>
                                    <i class="fas fa-trash-alt text-danger cursor-pointer" wire:click="deleteTask({{ $task->id }})"></i>
                                </div>
                                @endif
                                
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
       </div>
    </div>
</div>
