<div class="row mb-5">
    <div class="row align-items-center">
        <div class="col-auto  text-center ">
            @if ($user->avatar)
                <div class="profile_icon .profile_icon_size">
                    <img src="{{ $user->avatar }}" alt="" class="profile_icon_avatar">
                </div>
            @else
                <i class="fa-solid fa-circle-user icon-sm text-secondary" style="font-size:150px"></i>
            @endif
        </div>
        <div class="col  pt-3">
            <span class="display-5 fw-4  ">{{ $user->name }}</span>
            @if ($user->id === Auth::user()->id)
                <span class="ms-2"><a href="{{ route('profile.edit', $user) }}"
                        class="btn btn-outline-secondary p-2 fw-bold" style="font-size: 12px">Edit Profile</a></span>
            @else
                @if ($user->isFollowed())
                    <form action="{{ route('follow.destroy', $user) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger fw-bold ms-3">
                            Unfollow
                        </button>
                    </form>
                @else
                    <form action="{{ route('follow.store', $user) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary fw-bold ms-3">
                            Follow
                        </button>
                    </form>
                @endif


            @endif
            <div class="user_detail mt-3">
                <span><a href="{{ route('profile.show', $user) }}" class="text-decoration-none text-dark"><span
                            class="fw-bold">{{ $user->posts->count() }}</span>
                        {{ $user->posts->count() <= 1 ? 'post' : 'posts' }}</a></span>
                <span class="ms-5"><span class="fw-bold">{{ $user->followers->count() }}</span><a
                        href="{{ route('profile.follower', $user) }}" class="text-decoration-none text-dark">
                        follower</a></span>
                <span class="ms-5"><span class="fw-bold">{{ $user->followings->count() }}</span><a
                        href="{{ route('profile.following', $user) }}" class="text-decoration-none text-dark">
                        following</a></span>
            </div>
        </div>
    </div>
</div>
