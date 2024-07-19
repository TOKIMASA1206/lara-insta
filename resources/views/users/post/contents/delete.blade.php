    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $post->id }}"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel-{{ $post->id }}"><i
                            class="fa-solid fa-triangle-exclamation"></i> Delete Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post?

                    <div class="mt-3 w-75">
                        <img src="{{ $post->image }}" alt="Post Image" style="max-width: 100%; height: auto;">
                    </div>

                    <div class="post_description ">
                        {{ $post->description }}
                    </div>

                </div>

                <div class="p-3">

                    <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post) }}"
                        method="POST" class="float-end ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <a href="{{route('index')}}" class="btn btn-outline-danger float-end" data-dismiss="modal">Cancel</a>
                </div>


            </div>
        </div>
    </div>
