<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function index(){

        $all_posts = Post::all();
        $countUncategorizedPosts = 0;
        foreach($all_posts as $post){
            if($post->categoryPost->count() === 0){
            // if($post->categoryPost->isEmpty()){
                $countUncategorizedPosts ++;
            }
        }

        $all_categories = $this->category->latest()->get();
        return view('admin.categories.index')
        ->with('all_categories',$all_categories)
        ->with('countUncategorizedPosts',$countUncategorizedPosts);
    }


    public function store(Request $request)
    {
        //
        $this->category->name = $request->name;
        $this->category->save();
        return redirect()->route('admin.categories');

    }

    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('admin.categories');
    }
    public function update(Request $request, Category $category)
    {
        //
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories');
    }
}
