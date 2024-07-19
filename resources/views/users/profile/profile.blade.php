@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="row mb-5">
  <div class="row">
    <div class="col-4 border border-danger text-center ">
      @if (Auth::user()->avatar)
      <div class="profile_icon .profile_icon_size">
        <img src="{{Auth::user()->avatar}}" alt="" class="profile_icon_avatar" >
      </div>
  @else
      <i class="fa-solid fa-circle-user icon-sm text-secondary" style="font-size:150px"></i>
  @endif
    </div>
    <div class="col border border-danger pt-3">
      <span class="display-5 fw-4  border border-danger">{{Auth::user()->name}}</span>
      <span class="ms-2"><a href="{{route('profile.edit')}}" class="btn btn-outline-secondary p-2 fw-bold" style="font-size: 12px">Edit Profile</a></span>
      <div class="user_detail mt-3">
        <span><span class="fw-bold">1</span> Post</span>
        <span class="ms-5"><span class="fw-bold">1</span> follower</span>
        <span class="ms-5"><span class="fw-bold">1</span> following</span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  @foreach (Auth::user()->posts as $post)
      <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{ route('posts.show', $post) }}" class="d-block">
          <div class="square">
            <img src="{{ $post->image }}" alt="Post Image" class="grid-img">
          </div>
        </a>
      </div>
  @endforeach
</div>




@endsection