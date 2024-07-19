    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $post->id }}-unhide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $post->id }}-unhide"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content border border-primary">
              <div class="modal-header">
                  <h5 class="modal-title text-primary" id="exampleModalLabel-{{ $post->id }}-unhide"><i
                          class="fa-solid fa-triangle-exclamation"></i> Delete post</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                Are you sure you want to unhide this post?

                  <div class=" m-0 p-0 mt-3">
                    <img src="{{ $post->image }}" alt="" class="" style="max-width:250px; object-fit:cover">
                </div>

              </div>

              <div class="p-3">

                  <form id="unhide-form-{{ $post->id }}" action="{{route('admin.posts.unhide', $post->id)}}"
                      method="post" class="float-end ms-2">
                      @csrf
                      
                      <button type="submit" class="btn btn-primary">Unhide</button>
                  </form>

                  <a href="{{route('admin.posts')}}" class="btn btn-outline-primary float-end" data-dismiss="modal">Cancel</a>
              </div>


          </div>
      </div>
  </div>
