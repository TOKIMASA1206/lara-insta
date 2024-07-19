<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //

    public function index()
    {
        //
        $all_users = User::withTrashed()->paginate(2);
        return view('admin.users.index')->with('all_users',$all_users);
    }


    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('admin.users');
    }
    public function restore($id)
    {
        //
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('admin.users');
    }

}
