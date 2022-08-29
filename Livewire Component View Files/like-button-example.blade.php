<div>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center mt-3 pb-5">
    <div class="col mb-5">
    <div class="card h-100">
      <img class="card-img-top" height="200px" src="{{ $post->featured_image }}" alt="Card image cap">
      <div class="card-body">
        <p class="d-flex">
        <span class="badge rounded-pill bg-orange me-1">New</span>
          @foreach($post->tags as $tag)
            @if($tag->slug !== 'new')
              <span class="badge rounded-pill {{$tag->slug == 'new' ? 'bg-orange' : 'bg-purple'}} me-1">{{$tag->name}}</span>
            @endif
          @endforeach
        </p>
        <h5 class="card-title fs-4 fw-bold"><a href="/component/{{$post->slug}}" class="text-decoration-none text-gray-900">{{$post->title}}</a></h5>
      </div>
      <div class="card-footer bg-white border-0 text-muted">
        <div class="d-flex justify-content-between">
          @livewire('like-model',[
            'model' => $post
          ])
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
