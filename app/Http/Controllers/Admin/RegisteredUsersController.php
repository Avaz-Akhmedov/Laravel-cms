<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Request;


class RegisteredUsersController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::where("is_admin",false)->get();
        return view("admin.users.index",compact("users"));
    }


    //EDIT USER
    public function edit(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("admin.users.edit",compact("user"));
    }



    //UPDATE USER
    public function update(User $user,Request $request): \Illuminate\Http\RedirectResponse
    {
        $fields = $request->validate([
            "name" => "required",
            "email" => "required|email"
        ]);

        $user->update($fields);
        return redirect()->route("admin.users.index");
    }



      //DESTROY USER
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return redirect()->route("admin.users.index");

    }

  //MANAGE POSTS OF USER
    public function manage(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = $user->posts()->get();

        return view("admin.users.manage",compact("posts"));
    }
}
