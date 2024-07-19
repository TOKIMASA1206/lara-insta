@extends('layouts.app')

@section('title', 'Profile')

@section('content')


    <form action="{{route('admin.categories.store')}}" method="post">
      @csrf
      <div class="row mb-4">
        <div class="col-5">
          <input type="text" name="name" class="form-control" placeholder="Add a category" >
        </div>
        <div class="col-3 p-0">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
        </div>
      </div>
    </form>

    <table class="table table-hover align-middle bg-white border text-secondary table-category text-center">
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
                        {{ $category->name }}
                    </td>
                    <td class="align-middle">{{$category->categoryPost->count()}}</td>
                    @if ($category->updated_at)
                        <td class="align-middle">{{ $category->updated_at->format('Y-m-d H:i') }}</td>
                    @else
                        <td></td>
                    @endif


                    <td class="align-middle">
                        <a href="" class="btn btn-outline-warning" data-bs-toggle="modal"
                            data-bs-target="#exampleModal-{{ $category->id }}-edit">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="" class="btn btn-outline-danger ms-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal-{{ $category->id }}-delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>

                        {{-- delete toggle --}}
                        @include('admin.categories.delete')
                        {{-- restore toggle --}}
                        @include('admin.categories.edit')

                    </td>
                </tr>
            @endforeach
            <tr>
              <td colspan="2">
                Uncategorized <br>
                <span style="font-size:10px; opacity:0.8;">Hidden posts are not included.</span>
              </td>
              <td class="align-middle">
                {{$countUncategorizedPosts}}
              </td>
              <td></td>
              <td></td>
            </tr>
        </tbody>
    </table>



@endsection
