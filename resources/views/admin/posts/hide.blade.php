    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $post->id }}-hide" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-{{ $post->id }}-hide" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border border-danger">
                <div class="modal-header border border-danger">
                    <h5 class="modal-title text-danger" id="exampleModalLabel-{{ $post->id }}-hide"><i class="fa-solid fa-user-slash"></i> Hide post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to hide this post?

                    <div class=" m-0 p-0 mt-3">
                        <img src="{{ $post->image }}" alt="" class="" style="max-width:250px; object-fit:cover">
                    </div>

                </div>

                <div class="p-3">

                    <form id="hide-form-{{ $post->id }}" action="{{ route('admin.posts.hide', $post) }}"
                        method="post" class="float-end ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hide</button>
                    </form>

                    <a href="{{ route('admin.posts') }}" class="btn btn-outline-danger float-end"
                        data-dismiss="modal">Cancel</a>
                </div>


            </div>
        </div>
    </div>
