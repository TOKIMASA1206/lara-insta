@extends('layouts.app')

@section('title', 'Profile')

@section('content')


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
        <tbody>
            @foreach ($all_posts as $post)
                <tr>
                    <td class="align-middle" class="align-middle">
                        {{ $post->id }}
                    </td>
                    <td class="align-middle">
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
                    <td class="align-middle">
                        @if ($post->user)
                            @if ($post->user->trashed())
                                {{ $post->user->name }} (Inactive)
                            @else
                                {{ $post->user->name }}
                            @endif
                        @else
                            User not available
                        @endif
                    </td>
                    <td class="align-middle">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                    <td class="align-middle">
                        @if ($post->trashed())
                            <i class="fa-solid fa-circle-minus"></i>
                            &nbsp;Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i>
                            &nbsp;Visible
                        @endif
                    </td>
                    <td class="align-middle">


                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-ellipsis"></i>
                            </a>


                            @if ($post->trashed())
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <button href="" class="dropdown-item " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $post->id }}-unhide">
                                        <i class="fa-solid fa-eye"></i> Unhide Post {{ $post->id }}
                                    </button>
                                </div>
                            @else
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <button href="" class="dropdown-item text-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $post->id }}-hide">
                                        <i class="fa-solid fa-eye-slash"></i> Hide Post {{ $post->id }}
                                    </button>
                                </div>
                            @endif

                        </div>
                        {{-- delete toggle --}}
                        @include('admin.posts.hide')
                        {{-- restore toggle --}}
                        @include('admin.posts.unhide')

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
      {{ $all_posts->links() }}
  </div>


@endsection
