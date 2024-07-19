
@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="row">
  <div class="col-3">
    <div class="list-group">
      <a href="{{route('admin.users')}}" class="list-group-item text-decoration-none text-dark"><i class="fa-solid fa-users"></i> Users</a>
      <a href="{{route('admin.posts')}}" class="list-group-item text-decoration-none active"><i class="fa-solid fa-newspaper"></i> Posts</a>
      <a href="{{route('admin.categories')}}" class="list-group-item text-decoration-none text-dark "><i class="fa-solid fa-tags"></i> Categories</a>
    </div>
  </div>

  <div class="col-9">
    <table class="table table-hover align-middle bg-white border text-secondary table-post">
      <thead class="small  text-secondary">
        <tr class="">
          <th></th>
          <th></th>
          <th>CATEGORY</th>
          <th>OWNER</th>
          <th>CREATED AT</th>
          <th>STATUS</th>
          <th></th>
        </tr>
      </thead>
      <tbody >
        @foreach($all_posts as $post)
        <tr>
          <td class="align-middle" class="align-middle">
            {{$post->id}}
          </td>
          <td class="align-middle" >
            @if ($post->image)
            <div class=" m-0 p-0" style="width:150px; height:150px;">
                <img src="{{ $post->image }}" alt="" class="profile_icon_avatar">
            </div>
        @else
        <div class="" style="width:58px; height:58px; text-center">
          <i class="fa-solid fa-image" style="font-size:60px"></i>
        </div>
        @endif
          </td>

          <td class="align-middle">
            @foreach ($post->categoryPost as $category_post)
            <div class="badge bg-secondary bg-opacity-50 me-1">
                {{ $category_post->category->name }}
            </div>
        @endforeach
          </td>
          <td class="align-middle">{{$post->user->name}}</td>
          <td class="align-middle">{{ $post->created_at->format('Y-m-d H:i') }}</td>
          <td class="align-middle">
            <i class="fa-solid fa-circle text-primary"></i>
            &nbsp;Active
          </td>
          <td class="align-middle">
            <button href="" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $post->id }}">
              <i class="fa-solid fa-ellipsis"></i>
          </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection