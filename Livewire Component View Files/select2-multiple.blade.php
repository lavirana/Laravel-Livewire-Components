<div>
    <div wire:ignore>
        <label for="taskSelect" class="form-label">Select Tasks</label>
        <select class="form-select" id="taskSelect" multiple="multiple" >
            @foreach($tasks as $task)
                <option id="{{$task->id}}">{{$task->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="my-3">
        Selected Tasks : 
        @forelse($selectedTasks as $task)
            {{$task}},
        @empty
            None
        @endforelse
    </div>
    <script>
        $(document).ready(function() {
            $('#taskSelect').select2();

            $('#taskSelect').on('change', function (e) {
                @this.set('selectedTasks', $(this).val());
            });
        });
    </script>
</div>
