<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    //

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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
  public function store(Request $request)
  {
      //

  }

  /**
   * Display the specified resource.
   */
  public function show(User $user )
  {
      //

      return view('users.profile.show')->with('user',$user);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
      //
      return view('users.profile.edit')->with('user',$user);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
      //
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->introduction = $request->introduction;

      if ($request->avatar) {

        $user->avatar = 'data:avatar/' . $request->avatar->extension() . ';base64,' . base64_encode(file_get_contents($request->avatar));
    }

    $user->save();
    return redirect()->route('profile.show',$user->id)->with('user',$user);

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
      //

  }
}
