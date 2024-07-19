@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="{{ route('admin.users') }}" class="list-group-item text-decoration-none text-dark"><i
                        class="fa-solid fa-users"></i> Users</a>
                <a href="{{ route('admin.posts') }}" class="list-group-item text-decoration-none text-dark"><i
                        class="fa-solid fa-newspaper"></i> Posts</a>
                <a href="{{ route('admin.categories') }}" class="list-group-item text-decoration-none active"><i
                        class="fa-solid fa-tags"></i> Categories</a>
            </div>
        </div>

        <div class="col-7">
            <table class="table table-hover align-middle bg-white border text-secondary table-category">
                <thead class="small  text-secondary">
                    <tr class="bg-success">
                        <th>#</th>
                        <th>NAME</th>
                        <th>COUNT</th>
                        <th>LAST UPDATE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_categories as $category)
                        <tr>
                            <td class="align-middle" class="align-middle">
                                {{ $category->id }}
                            </td>

                            <td class="align-middle">
                              {{$category->name}}
                            </td>
                            <td class="align-middle">Count</td>
                            @if($category->create_at)
                            <td class="align-middle">{{ $category->created_at->format('Y-m-d H:i') }}</td>
                            @else
                            <td></td>
                            @endif


                            <td class="align-middle">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
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
