
@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="row">
  <div class="col-3">
    <div class="list-group">
      <a href="{{route('admin.users')}}" class="list-group-item text-decoration-none active"><i class="fa-solid fa-users"></i> Users</a>
      <a href="{{route('admin.posts')}}" class="list-group-item text-decoration-none text-dark"><i class="fa-solid fa-newspaper"></i> Posts</a>
      <a href="{{route('admin.categories')}}" class="list-group-item text-decoration-none text-dark "><i class="fa-solid fa-tags"></i> Categories</a>
    </div>
  </div>

  <div class="col-9">
    <table class="table table-hover align-middle bg-white border text-secondary table-user">
      <thead class="small  text-secondary">
        <tr class="bg-success">
          <th></th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>CREATED AT</th>
          <th>STATUS</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="align-items-center">
        @foreach($all_users as $user)
        <tr>
          <td class="align-middle">
            @if ($user->avatar)
            <div class="post_icon m-0 p-0" style="width:58px; height:58px;">
                <img src="{{ $user->avatar }}" alt="" class="profile_icon_avatar">
            </div>
        @else
        <div class="" style="width:58px; height:58px; text-center">
            <i class="fa-solid fa-circle-user icon-sm" style="font-size:58px;"></i>
        </div>
        @endif
          </td>

          <td class="align-middle fw-bold">{{$user->name}}</td>
          <td class="align-middle">{{$user->email}}</td>
          <td class="align-middle">{{ $user->created_at->format('Y-m-d H:i') }}</td>
          <td class="align-middle">
            <i class="fa-solid fa-circle text-success"></i>
            &nbsp;Active
          </td>
          <td class="align-middle">


            <div class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fa-solid fa-ellipsis"></i>
              </a>




              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <button href="" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $user->id }}">
                  <i class="fa-solid fa-trash-can"></i> delete
              </button>
              </div>
          </div>








            {{-- <button href="" class="dropdown-item u" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $user->id }}">
              <i class="fa-solid fa-ellipsis"></i>
          </button> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection