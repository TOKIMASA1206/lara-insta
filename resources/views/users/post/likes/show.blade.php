    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $post->id }}-show" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-{{ $post->id }}-show" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border border-danger">
                <div class="modal-header ">
                    <h5 class="modal-title " id="exampleModalLabel-{{ $post->id }}-show"><i
                            class="fa-solid fa-heart text-danger"></i> Likes Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <ul class="list-group w-75 mx-auto">
                        @foreach ($post->likes as $like)
                            <div class="list-group mb-3">
                                <a href="{{ route('profile.show', $like->user->id) }}"
                                    class="list-group-item list-group-item-action align-items-center border-0 p-0">
                                    <div class="row ">
                                        <div class="user-icon col-1">
                                            @if ($like->user->avatar)
                                                <img src="{{ $like->user->avatar }}" alt="Profile Avatar"
                                                    class="profile-icon-avatar rounded-circle"
                                                    style="width: 48px; height: 48px; object-fit:cover;">
                                            @else
                                                <i class="fa-solid fa-circle-user icon-sm" style="font-size: 40px;"></i>
                                            @endif
                                        </div>
                                        <div class="user-info col">
                                            <h5 class="mb-0 ms-2 fw-bold">{{ $like->user->name }}</h5>
                                            <p class="p-0 ms-2">{{ $like->user->email }}</p>
                                        </div>
                                        <div class="text-end col p-0" style="width:90%;">
                                            @if ($like->user->id !== Auth::user()->id)
                                                @if ($like->user->isFollowed())
                                                    <form action="{{ route('follow.destroy', $like->user) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-secondary">
                                                            Unfollow
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('follow.store', $like->user) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            Follow
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
