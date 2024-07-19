<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        
            $this->like->user_id = Auth::user()->id;
            $this->like->post_id = $post->id;
            $this->like->save();
            return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
        $like = auth()->user()->like()
            ->with('post')
            ->get();

        return view('like.index')
            ->with('like', $like);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //

        $this->like = Like::where('user_id', auth()->id())
        ->where('post_id', $post->id)
        ->delete();

        return redirect()->back();
    }
}
