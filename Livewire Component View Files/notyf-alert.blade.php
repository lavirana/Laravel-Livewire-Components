<div class="row">
    <div class="d-flex justify-content-around">
        <div>
            <button class="btn btn-success text-white" wire:click="$emit('successAlert', 'This is a success message')">Success Alert</button>
        </div>
        <div>
            <button class="btn btn-danger text-white" wire:click="$emit('errorAlert', 'This is a error message')">Error Alert</button>
        </div>
    </div>
</div>
