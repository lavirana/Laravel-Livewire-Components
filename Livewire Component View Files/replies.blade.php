<div class="comment-replies bg-light p-3 my-4 ms-5 rounded">
<h6 class="comment-replies-title mb-4 text-muted text-uppercase">{{$model->totalCommentsCount()}} replies</h6>

@foreach($comments as $comment)
<div class="reply d-flex mb-4" wire:key="{{$comment->id}}">
    <div class="flex-shrink-0">
    <div class="avatar avatar-sm">
        <img class="avatar-img rounded-circle" height="50" src="{{$comment->commented->avatarUrl()}}" alt="">
    </div>
    </div>
    <div class="flex-grow-1 ms-2 ms-sm-3">
    <div class="reply-meta d-flex align-items-baseline">
        <h6 class="mb-0 me-2">{{$comment->commented->name}}</h6>
        <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
        @auth
            @if($comment->commented_id == auth()->user()->id)
            <a class="ms-auto"><i class="fas fa-trash-alt text-danger cursor-pointer" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="setDeleteId({{ $comment->id }})"></i></a>
            @endif
        @endauth
    </div>
    <div class="reply-body">
        {{$comment->comment}}
    </div>
    </div>
</div>
@endforeach
</div>
