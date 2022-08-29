<div>
        @auth
                @if($isLiked)
                <i id='btn' class="fas text-blue border border-primary fa-thumbs-up fs-5 border rounded-circle p-2 cursor-pointer" wire:click="unlike"></i><span class="text-blue fw-bold ms-2 fs-5">{{$likesCount}} likes</span>
                @else
                <i id='btn' class="fa fa-thumbs-up fs-5 border rounded-circle p-2 cursor-pointer" wire:click="like"></i><span class="ms-2 fs-5">{{$likesCount}} likes</span>
                @endif
        @else
                <i id='btn' class="fa fa-thumbs-up fs-5 border rounded-circle p-2 cursor-pointer" data-bs-toggle="modal" data-bs-target="#loginModal"></i><span class="ms-2 fs-5">{{$likesCount}} likes</span>
        @endauth
</div>
