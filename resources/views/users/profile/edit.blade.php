@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="card border shadow p-5">

            <h3 class="mb-3 fw-light text-muted">Update Profile</h3>
            <div class="row mb-3">
                <div class="col-4">
                    @if ($user->avatar)
                    <div class="profile_icon .profile_icon_size">
                      <img src="{{$user->avatar}}" alt="" class="profile_icon_avatar" >
                    </div>
                    @else
                        <i class="fa-solid fa-circle-user icon-sm text-secondary" style="font-size:150px"></i>
                    @endif
                </div>
                <div class="col-auto align-self-end">
                    <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-2">
                    <div class="form-text" id="avatar-info">
                        <p class="mb-0">Acceptable formats: jpeg, jpg, png, gif only.</p>
                        <p class="mb-0">Maximum file size is 1048kb.</p>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">E-Mail Address</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="mb-5">
                <label for="introduction" class="form-label fw-bold">Introduction</label>
                <textarea type="text" name="introduction" id="introduction" rows="5" class="form-control"
                    >{{ $user->introduction }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning px-5">Save</button>

        </div>

    </form>

@endsection
