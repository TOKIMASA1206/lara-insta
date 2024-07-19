<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //

    public function index(){
        $all_posts = Post::withTrashed()->paginate(2);
        return view('admin.posts.index')->with('all_posts',$all_posts);
    }


    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts');
    }
    public function restore($id)
    {
        //
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('admin.posts');
    }
}
