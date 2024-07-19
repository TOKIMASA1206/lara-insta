@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    <div class="row">
        <div class="col-8">


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





        </div>

        <div class="col-md-4">

            <div class="row align-items-center mb-5 bg-white shadow-sm rounded-3 py-3">
                <div class="col-auto">
                    @if (Auth::user()->avatar)
                        <div class="post_icon" style="width:70px; height:70px;">
                            <a href="{{ route('profile.show', Auth::user()->id) }}"
                                class="text-decoration-none text-dark fs-5 text-trancate">
                                <img src="{{ Auth::user()->avatar }}" alt="" class="profile_icon_avatar">
                            </a>
                        </div>
                    @else
                        <a href="{{ route('profile.show', Auth::user()->id) }}"
                            class="text-decoration-none text-dark fs-5 text-trancate">
                            <i class="fa-solid fa-circle-user icon-sm" style="font-size:55px;"></i>
                        </a>
                    @endif
                </div>
                <div class="col">
                    <p class="fw-bold p-0 m-0">
                        <a href="{{ route('profile.show', Auth::user()->id) }}"
                            class="text-decoration-none text-dark fs-5 text-trancate">
                            {{ Auth::user()->name }}
                        </a>
                    </p>
                    <p class="m-0">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <p class="fw-bold text-secondary">Suggestions For You</p>
                </div>
                <div class="col text-end">
                    <a href="{{ route('suggest.show') }}" class="fw-bold text-dark text-decoration-none">See All</a>
                </div>
            </div>
            @if ($suggestedUsers)
                @foreach (collect($suggestedUsers)->take(3) as $user)
                    <div class="list-group mb-3 mx-auto">
                        <a href="{{ route('profile.show', $user->id) }}"
                            class="list-group-item list-group-item-action align-items-center border-0 p-0">
                            <div class="row align-items-center">
                                <div class="user-icon col-1">
                                    @if ($user->avatar)
                                        <img src="{{ $user->avatar }}" alt="Profile Avatar"
                                            class="profile-icon-avatar rounded-circle"
                                            style="width: 40px; height: 40px; object-fit:cover;">
                                    @else
                                        <i class="fa-solid fa-circle-user icon-sm" style="font-size: 40px;"></i>
                                    @endif
                                </div>
                                <div class="user-info col">
                                    <h5 class="mb-0 fw-bold">{{ $user->name }}</h5>
                                </div>
                                <div class="text-end col p-0" style="width:90%;">
                                    @if ($user->isFollowed())
                                        <form action="{{ route('follow.destroy', $user) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn shadow-none text-secondary">
                                                Unfollow
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow.store', $user) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn shadow-none text-primary">
                                                Follow
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <h5>No recommended users</h5>
                </div>
            @endif
        </div>

    </div>



@endsection
