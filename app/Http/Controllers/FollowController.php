<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $follow;

     public function __construct(Follow $follow)
     {
         $this->follow = $follow;
     }

    public function follower(User $user)
    {
        //
        return view('users.profile.follower')->with('user',$user);
    }
    public function following(User $user)
    {
        //
        return view('users.profile.following')->with('user',$user);
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
    public function store(Request $request, User $user)
    {
        //
        $this->follow->follower_id = Auth::user()->id;
        $this->follow->following_id = $user->id;

        $this->follow->save();

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follow $follow, User $user)
    {
        //
        $this->follow = Follow::where('follower_id', auth()->id())
        ->where('following_id', $user->id)
        ->delete();

        return redirect()->back();
    }
}
