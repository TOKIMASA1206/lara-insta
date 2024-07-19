    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $category->id }}-delete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-{{ $category->id }}-delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border border-danger">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel-{{ $category->id }}-delete"><i
                            class="fa-solid fa-trash-can"></i> Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <span class="fw-bold">{{ $category->name }}</span> category?
                    This action will affect all the posts under this category. Posts without category will fall under
                    Uncategorized.

                </div>

                <div class="p-3">

                    <form  action="{{ route('admin.categories.destroy',$category) }}"
                        method="post" class="float-end ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <a href="{{ route('admin.categories') }}" class="btn btn-outline-danger float-end"
                        data-dismiss="modal">Cancel</a>
                </div>


            </div>
        </div>
    </div>
