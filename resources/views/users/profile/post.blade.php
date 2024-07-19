<div class="row">
  @foreach ($user->posts as $post)
      <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{ route('posts.show', $post) }}" class="d-block">
          <div class="square">
            <img src="{{ $post->image }}" alt="Post Image" class="grid-img">
          </div>
        </a>
      </div>
  @endforeach
</div>