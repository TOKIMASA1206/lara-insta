@extends('layouts.app')

@section('title', 'Show post')

@section('content')
    <div class="row border shadow">
        <div class="col p-0 border-end">
            <img src="{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4 px-0 bg-white">
            <div class="card border-0">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            @if ($post->user->avatar)
                                <div class="post_icon">
                                    <img src="{{ $post->user->avatar }}" alt="" class="profile_icon_avatar">
                                </div>
                            @else
                                <i class="fa-solid fa-circle-user icon-sm"></i>
                            @endif
                        </div>
                        <div class="col ps-0">
                            <a href="{{ route('profile.show', $post->user->id) }}"
                                class="text-decoration-none text-dark">{{ $post->user->name }}</a>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <button class="btn btn-sm shadown-none" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">

                                    @if (auth()->user()->id === $post->user->id)
                                        <a href="{{ route('posts.edit', $post) }}" class="dropdown-item">
                                            <i class="fa-solid fa-pen-to-square"></i> edit
                                        </a>

                                        <button href="" class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $post->id }}">
                                            <i class="fa-solid fa-trash-can"></i> delete
                                        </button>
                                    @else
                                        <a href="" class="dropdown-item text-danger">
                                            Unfollow
                                        </a>
                                    @endif
                                </div>

                            </div>
                            {{-- delete toggle --}}
                            @include('users.post.contents.delete')
                        </div>
                    </div>
                </div>
                <div class="card-body w-100">
                    <div class="post_info row align-items-center">
                        <div class="col d-flex justify-content-start align-items-center">
                            <button type="submit" class="btn p-0 me-2">
                                <i class="fa-regular fa-comment"></i>
                            </button>
                            @if ($post->isliked())
                            <form action="{{ route('likes.destroy', $post) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none;" class="me-2">
                                    <i class="fa-solid fa-heart" style="color: red;"></i> {{-- 塗りつぶされたハートのアイコン --}}
                                </button>
                            </form>
                            @else
                            <form action="{{ route('likes.store', $post) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none;" class="me-2">
                                    <i class="fa-regular fa-heart"></i> {{-- 塗りつぶされていないハートのアイコン --}}
                                </button>
                            </form>
                            @endif
                            <button type="submit" class="btn p-0">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                            </button>
                        </div>
                        <div class="col text-end">
                            @if ($post->categoryPost->isNotEmpty())
                            @foreach ($post->categoryPost as $category_post)
                                <div class="badge bg-secondary bg-opacity-50 me-2">
                                    # {{ $category_post->category->name}}
                                </div>
                            @endforeach
                        @else
                            <div class="badge bg-dark">
                                # Uncategorized
                            </div>
                        @endif
                        </div>
                    </div>
                    

                    <div class="post_like">
                        <div class="ms-1 p-0">
                            like! <a href="" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-{{ $post->id }}-show">
                                {{ $post->likes->count() }}
                            </a>
                        </div>
                    </div>
            
                    {{-- Like User toggle --}}
                    @include('users.post.likes.show')

                    <div class="post_description ">
                        <a href="#" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
                        &nbsp;
                        <p class="d-inline fw-bold">{{ $post->description }}</p>
                        <p class="text-muted small">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>


                <div class="post_comment px-3 mb-3">
                    <form action="{{ route('comments.store', $post->id) }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="comment" class="form-control" for="commnet">
                            <div class="input-group-prepend">
                                <input type="submit" name="submit" value="Post"
                                    class="input-group-text btn-secondary border border-1 border-dark rounded-1">
                            </div>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="post_comments my-3 px-3">
                    <ul class="list-group">
                        @foreach ($post->comments as $comment)
                            <li class="list-group-item p-0 border-0 mb-3">
                                <a href="#"
                                    class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                &nbsp;
                                <p class="d-inline">{{ $comment->body }}</p>

                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <span class="text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
                                    &middot;
                                    @if ($comment->user->id == Auth::user()->id)
                                        <button class="btn shadow-none small text-danger">Delete</button>
                                    @endif
                                </form>
                            </li>
                        @endforeach

                    </ul>

                </div>



            </div>
        </div>
    @endsection
