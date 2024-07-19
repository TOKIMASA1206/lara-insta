@extends('layouts.app')

@section('content')
    <div class="container " style="max-width: 500px;">

        @if ($search)
            <h3 class="mb-5">Search Results for "<strong>{{ $search }}</strong>"</h3>
        @endif

        @if ($posts->isEmpty() && $users->isEmpty())
            <p>No results found.</p>
        @else
            @if (!$posts->isEmpty())
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-header">
                            {{-- title --}}
                            @include('users.post.contents.title')
                        </div>
                        {{-- image --}}
                        @include('users.post.contents.image')

                        {{-- body --}}
                        @include('users.post.contents.body')
                        {{-- delete toggle --}}
                        @include('users.post.contents.delete')

                    </div>
                @endforeach
            @endif

            @if (!$users->isEmpty())
                <ul class="list-group">
                    @foreach ($users as $user)
                        <div class="list-group mb-3">
                            <a href="{{ route('profile.show', $user->id) }}"
                                class="list-group-item list-group-item-action align-items-center border-0 p-0">
                                <div class="row ">
                                    <div class="user-icon col-1">
                                        @if ($user->avatar)
                                            <img src="{{ $user->avatar }}" alt="Profile Avatar"
                                                class="profile-icon-avatar rounded-circle"
                                                style="width: 48px; height: 48px; object-fit:cover;">
                                        @else
                                            <i class="fa-solid fa-circle-user icon-sm" style="font-size: 40px;"></i>
                                        @endif
                                    </div>
                                    <div class="user-info col">
                                        <h5 class="mb-0 ms-2 fw-bold">{{ $user->name }}</h5>
                                        <p class="p-0 ms-2">{{ $user->email }}</p>
                                    </div>
                                    <div class="text-end col p-0" style="width:90%;">
                                        @if ($user->id !== Auth::user()->id)
                                            @if ($user->isFollowed())
                                                <form action="{{ route('follow.destroy', $user) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-secondary">
                                                        Unfollow
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('follow.store', $user) }}" method="POST"
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
            @endif
        @endif
    </div>
@endsection
