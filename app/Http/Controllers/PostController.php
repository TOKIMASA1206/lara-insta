<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_categories = Category::all();
        return view('users.post.create')->with('all_categories', $all_categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->post->user_id = auth()->user()->id;
        $this->post->description = $request->description;
        $this->post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));

        $this->post->save();

        $category_post = [];
        // ew coding, re writing the index array turning it into associative array
        foreach ($request->categories as $category_id):
            $category_post[] = ["category_id" => $category_id];
        endforeach;

        $this->post->categoryPost()->createMany($category_post);


        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('users.post.show')->with('post',$post);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $all_categories = Category::all();
        return view('users.post.edit')
            ->with('all_categories', $all_categories)
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->user_id = auth()->user()->id;
        $post->description = $request->description;

        if ($request->image) {

            $post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        }

        $post->categoryPost()->delete();

        
        $category_post = [];
        // ew coding, re writing the index array turning it into associative array
        foreach ($request->categories as $category_id):
            $category_post[] = ["category_id" => $category_id];
        endforeach;
        
        
        $post->categoryPost()->createMany($category_post);
        
        
        $post->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('index');
    }
    

}
