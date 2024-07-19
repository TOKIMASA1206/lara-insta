
    <span class="post_user_icon float-start">
        @if ($post->user->avatar)
        <div class="post_icon">
          <img src="{{$post->user->avatar}}" alt="" class="profile_icon_avatar" >
        </div>
      @else
          <i class="fa-solid fa-circle-user icon-sm"></i>
      @endif
    </span>
    <span class="post_user_name float-start">
        <a href="{{route('profile.show', $post->user->id )}}" class="text-decoration-none text-dark">
            {{ $post->user->name }}
        </a>
    </span>
    <span class="float-end fw-bold">
        <div class="dropdown">
            <button class="btn btn-sm shadown-none" data-bs-toggle="dropdown">
                <i class="fa-solid fa-ellipsis"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end">

                @if (auth()->user()->id === $post->user->id)
                    <a href="{{ route('posts.edit', $post) }}" class="dropdown-item">
                        <i class="fa-solid fa-pen-to-square"></i> edit
                    </a>

                    <button href="" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $post->id }}">
                        <i class="fa-solid fa-trash-can"></i> delete
                    </button>

                @else
                @if ($post->user->isFollowed())
                <form action="{{ route('follow.destroy', $post->user) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none;" class="text-danger p-2 fw-bold ms-1">
                        Unfollow
                    </button>
                </form>
                @else
                <form action="{{ route('follow.store', $post->user) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit"  style="background: none; border: none;" class="text-primary p-2 fw-bold ms-1">
                        Follow
                    </button>
                </form>
                @endif
                @endif
            </div>

        </div>
    </span>







