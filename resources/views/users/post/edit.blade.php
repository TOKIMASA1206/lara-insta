@extends('layouts.app')

@section('title', 'Create post')

@section('content')

    <form action="{{route('posts.update',$post)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

        <div class="row mb-3">
            <div class="col">
                <label for="categories" class="form-label fw-bold">Categories (up to 3)</label><br>
                    @foreach ($all_categories as $category)
                        <div class="form-check form-check-inline align-item-cneter">
                            <input class="form-check-input" type="checkbox" id="category{{ $category->id }}"
                                name="categories[]" value="{{ $category->id }}"
                                @foreach ($post->categoryPost as $postCategory)
                                @if ($category->id === $postCategory->category_id)
                                    checked
                                @endif
                            @endforeach
                                >
                            <label class="form-check-label" for="category{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="What's on your mind ?">{{$post->description}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
          <div class="col">
             <label for="image" class="form-label fw-bold d-block">Image</label>
              <img src="{{ $post->image }}" alt="Post Image" >
                <input type="file" name="image" class="form-control mt-3">
                The acceptable formats are jpeg,jpg,png,and gif only <br>
                Max file is 1048kb.
            </div>

        </div>

        <input type="submit" name="submit" value="Post" class="btn btn-primary w-25">


    </form>
@endsection
