@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    {{-- HEADER --}}
    @include('users.profile.header')

    <div class="container">
        <h1 class="text-center mb-4">Following</h1>

        @if ($user->followings->count() > 0)
            <div class="row w-50 mx-auto">
              <ul class="list-group">
                @foreach ($user->followings as $following)
                    <div class="list-group mb-3">
                        <a href="{{ route('profile.show', $following->following->id) }}"
                            class="list-group-item list-group-item-action align-items-center border-0 p-0">
                            <div class="row align-items-center">
                                <div class="user-icon col-1">
                                    @if ($following->following->avatar)
                                        <img src="{{ $following->following->avatar }}" alt="Profile Avatar"
                                            class="profile-icon-avatar rounded-circle"
                                            style="width: 48px; height: 48px; object-fit:cover;">
                                    @else
                                        <i class="fa-solid fa-circle-user icon-sm" style="font-size: 40px;"></i>
                                    @endif
                                </div>
                                <div class="user-info col">
                                    <h5 class="mb-0 ms-2 fw-bold">{{ $following->following->name }}</h5>
                                </div>
                                <div class="text-end col p-0" style="width:90%;">
                                    @if ($following->following->id !== Auth::user()->id)
                                        @if ($following->following->isFollowed())
                                            <form action="{{ route('follow.destroy', $following->following) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn shadow-none small text-secondary ">
                                                    Unfollow
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow.store', $following->following) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn shadow-none small text-primary">
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
        @else
            <div class="text-center">
                <h3>No followings yet</h3>
            </div>
        @endif
    </div>




@endsection
