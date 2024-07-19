<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $suggestedUsers = $this->suggestedUsers();
        $posts = $this->filterPost();
        return view('users.home')
        ->with('posts',$posts)
        ->with('suggestedUsers',$suggestedUsers);
    }

    public function suggestedUsers(){
        $all_users = User::all()->except(auth()->user()->id);
        $suggestedUsers = [];
        foreach($all_users as $user){
            if(!$user->isFollowed()){
                $suggestedUsers[] = $user;
            }
        }

        return $suggestedUsers;
    }


    public function filterPost(){
        $all_posts = Post::latest()->get();
        $posts = [];
        foreach($all_posts as $post){
            if ($post->user && ($post->user->isFollowed() || $post->user->id == Auth::id())){
                $posts[] = $post;
            }
        }

        return $posts;
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // ポストを検索
        $posts = Post::where('description', 'LIKE', "%{$search}%")
                      ->get();

        // ユーザーを検索
        $users = User::where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%")
                      ->get();

        return view('users.search.result', compact('posts', 'users', 'search'));
    }

    public function suggest(){
        $suggestedUsers = $this->suggestedUsers();

        return view('users.suggest_user.show')->with('suggestedUsers',$suggestedUsers);
    }
}
