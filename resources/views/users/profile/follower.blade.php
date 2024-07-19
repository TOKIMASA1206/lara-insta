@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    {{-- HEADER --}}
    @include('users.profile.header')

    <div class="container">
        <h1 class="text-center mb-4">Follower</h1>

        @if ($user->followers->count() > 0)
            <div class="row w-50 mx-auto">
                <ul class="list-group">
                    @foreach ($user->followers as $follower)
                        <div class="list-group mb-3">
                            <a href="{{ route('profile.show', $follower->follower->id) }}"
                                class="list-group-item list-group-item-action border-0 p-0">
                                <div class="row align-items-center ">
                                    <div class="user-icon col-1">
                                        @if ($follower->follower->avatar)
                                            <img src="{{ $follower->follower->avatar }}" alt="Profile Avatar"
                                                class="profile-icon-avatar rounded-circle"
                                                style="width: 48px; height: 48px; object-fit:cover;">
                                        @else
                                            <i class="fa-solid fa-circle-user icon-sm" style="font-size: 40px;"></i>
                                        @endif
                                    </div>
                                    <div class="user-info col">
                                        <h5 class="mb-0 ms-2 fw-bold">{{ $follower->follower->name }}</h5>
                                    </div>
                                    <div class="text-end col p-0" style="width:90%;">
                                        @if ($follower->follower->id !== Auth::user()->id)
                                            @if ($follower->follower->isFollowed())
                                                <form action="{{ route('follow.destroy', $follower->follower) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn shadow-none small text-secondary">
                                                        Unfollow
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('follow.store', $follower->follower) }}"
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
                <h3>No followers yet</h3>
            </div>
        @endif
    </div>




@endsection
