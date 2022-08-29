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
              </div>
              <div class="comment-body text-wrap text-break">
                {{$comment->comment}}
              </div>
            </div>
          </div>
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
        <div class="comment-form d-flex align-items-center">
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
              <button class="btn btn-sm bg-purple text-white mt-3" disabled='disabled' id='bttnsubmit'>Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
      <button class="btn btn-sm btn-primary text-white mt-2" data-bs-toggle="modal" data-bs-target="#loginModal">Add Comment</button>
    @endauth
    <!-- New Comment Section Ends -->
    <div class="mt-5">
      {{ $comments->links() }}
    </div>
  </div>
</div>
</div>
<script>
function toggleButton(ref,bttnID){
    document.getElementById(bttnID).disabled= ((ref.value !== ref.defaultValue) ? false : true);
}
</script>
