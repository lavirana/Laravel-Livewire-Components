<div>
<div class="d-flex align-items-center justify-content-center bg-white py-3">
  <div class="container">
   <!-- Heading-->
    <div class="row justify-content-center mb-4">
      <div class="col-lg-12">
        <h4 class="text-indigo">{{($model->totalCommentsCount() ? "{$model->totalCommentsCount()} Comments" : 'Comments')}}</h4>
      </div>
    </div>
    <!-- Heading Ends -->
    <!-- All Comments Section-->
    <div class="row justify-content-center mb-4">
      <div class="col-lg-12">
        <div class="comments" wire:key="comments">
          @forelse($comments as $comment)
          <div class="comment d-flex mb-4" wire:key="{{$comment->id}}">
            <div class="flex-shrink-0">
              <div class="avatar avatar-sm">
                <img class="avatar-img rounded-circle border" height="50" src="{{$comment->commented->avatarUrl()}}" alt="">
              </div>
            </div>
            <div class="flex-grow-1 ms-2 ms-sm-3">
              <div class="comment-meta d-flex align-items-baseline">
                <h6 class="me-2">{{$comment->commented->name}}</h6>
                <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                @auth
                <div class="ms-auto text-gray-500 cursor-pointer" wire:click="selectCommentToReply({{$comment->id}})"><i class="fas fa-reply"></i> Reply</div>
                  @if($comment->commented_id == auth()->user()->id)
                  <a><i class="fas fa-trash-alt text-danger cursor-pointer ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="setDeleteId({{ $comment->id }})"></i></a>
                  @endif
                @endauth
              </div>
              <div class="comment-body text-wrap text-break">
                {{$comment->comment}}
              </div>
            </div>
          </div>
            @if(isset($replyTo) && $comment->id == $replyTo->id)
            <div class="edit-comment my-3 ms-5 bg-gray-100 p-2">
                <div class="comment-form d-flex align-items-center">
                <div class="flex-shrink-0 align-self-start">
                    <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img rounded-circle border" height="50" src="{{$user->avatarUrl()}}" alt="">
                    </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                    <form wire:submit.prevent="replyComment">
                    <textarea onkeyup="toggleButton(this,'bttnsubmit');" class="form-control py-0 px-1 border-0 @error('replyComment') is-invalid @enderror" rows="2" placeholder="Start writing your reply.." style="resize: none;" wire:model.lazy="replyComment"></textarea>
                    @error('replyComment')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <button class="btn btn-sm bg-purple text-white mt-3">Reply</button>
                    <button type="button" class="btn btn-sm bg-gray-300 text-white mt-3" wire:click="cancelReply">Cancel</button>
                    </form>
                </div>
                </div>
            </div>
            @endif
            @if($comment->totalCommentsCount() > 0)
              @livewire('comment-pro',[
                  'model' => $comment,
                  'view' => 'replies'
              ], key($comment->id))
            @endif
          @empty
          <div class="text-center">
            <img src="/images/illustrations/comment.png" alt="no comments" height="400" class="mt-n5"/>
            <p class="text-cyan fs-4"> It's so empty out here, go ahead and post some comments</p>
          </div>
          @endforelse
        </div>
      </div>
    </div>
    <!-- All Comments Section Ends-->
    <!-- New Comment Section -->
    @auth
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="comment-form d-flex align-items-center p-2 bg-gray-100">
          <div class="flex-shrink-0 align-self-start">
            <div class="avatar avatar-sm rounded-circle">
              <img class="avatar-img rounded-circle border" height="50" src="{{auth()->user()->avatarUrl()}}" alt="">
            </div>
          </div>
          <div class="flex-grow-1 ms-2 ms-sm-3">
            <form wire:submit.prevent="postComment">
              <textarea onkeyup="toggleButton(this,'bttnsubmit');" class="form-control py-0 px-1 border-0 @error('newComment') is-invalid @enderror" rows="2" placeholder="Start writing..." style="resize: none;" wire:model.lazy="newComment"></textarea>
              @error('newComment')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
              <button class="btn btn-sm bg-purple text-white mt-3">
                Post
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <button class="btn btn-sm btn-primary text-white mt-2" data-bs-toggle="modal" data-bs-target="#loginModal">Add Comment</button>
      </div>
    </div>
    @endauth
    <!-- New Comment Section Ends -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="mt-5">
            {{ $comments->links() }}
            </div>
        </div>
    </div>
  </div>
</div>

<!--Delete Modal-->
<div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:key="delete-model" wire:ignore.self> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this comment?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger text-white" wire:click.prevent="$emit('deleteComment')" class="btn btn-danger close-modal" data-bs-dismiss="modal">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>
</div>
