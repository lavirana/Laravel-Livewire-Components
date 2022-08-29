<div>
    @if(isset($post->customMeta->attachment))
        <h3 class="my-4 fs-3 text-teal fw-bold"><i class="fas fa-download text-purple"></i> Download Code</h3>
        <div>
        <p>Download the Component class, view file and other required files</p>
        @auth
            @if($post->customMeta->pro_component)
                @if(isset(auth()->user()->payment))
                    <a wire:click="download" class="btn btn-primary text-white">Download</a>
                @else
                    <p class="alert alert-warning"><i class="fa fas fa-warning"></i> This is a pro component. Get <a href="/home#payment">Livewiredemos pro access</a> to view / download the component code.</p>
                @endif
            @else
            <a wire:click="download" class="btn btn-primary text-white">Download</a>
            @endif
        @else
            @if($post->customMeta->pro_component)
            <p class="alert alert-warning"><i class="fa fas fa-warning"></i> This is a pro component. Get <a href="/home#payment">Livewiredemos pro access</a> to view / download the component code.</p>
            @else
            <p class="alert alert-warning"><i class="fa fas fa-warning"></i> Please login to download the component code</p>
            @endif
        @endauth
        </div>
    @endif
</div>
