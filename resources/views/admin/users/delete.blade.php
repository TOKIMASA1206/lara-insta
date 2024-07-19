    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $user->id }}-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $user->id }}-delete"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title text-danger" id="exampleModalLabel-{{ $user->id }}-delete"><i
                          class="fa-solid fa-triangle-exclamation"></i> Delete user</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  Are you sure you want to delete <span class="fw-bold">{{$user->name}}</span>?

              </div>

              <div class="p-3">

                  <form id="delete-form-{{ $user->id }}" action="{{route('admin.users.destroy',$user)}}"
                      method="post" class="float-end ms-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>

                  <a href="{{route('admin.users')}}" class="btn btn-outline-danger float-end" data-dismiss="modal">Cancel</a>
              </div>


          </div>
      </div>
  </div>
