    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $category->id }}-edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-{{ $category->id }}-edit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border border-warning">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel-{{ $category->id }}-edit"><i
                            class="fa-solid fa-pen-to-square"></i> Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-form-{{ $category->id }}" action="{{ route('admin.categories.update', $category) }}"
                    method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">

                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">

                    </div>

                    <div class="p-3">

                        <button type="submit" class="btn btn-warning float-end ms-2 mb-3">Activate</button>

                        <a href="{{ route('admin.categories') }}" class="btn btn-outline-warning float-end"
                            data-dismiss="modal">Cancel</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
