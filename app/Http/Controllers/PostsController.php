<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
class PostsController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts =  Posts::latest()->get();
        return view("posts.index",compact("posts"));
    }




    public function show(Posts $post) {
        return view("posts.show",compact("post"));
    }



    public function store(StorePostRequest $request): \Illuminate\Http\RedirectResponse
    {
         $fields = $request->validated();

         $fields["user_id"] = auth()->id();
         Posts::create($fields);

         return redirect()->route("dashboard");
    }


    public function edit(Posts $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("posts.edit",compact("post"));
    }

    public function update(Posts $post,StorePostRequest $request) {
        $fields = $request->validated();

        $post->update($fields);


        if (auth()->user()->is_admin == 1 ) {
            return redirect()->route("admin.index");
        }

        return redirect()->route("dashboard");

    }


    public function destroy(Posts $post): \Illuminate\Http\RedirectResponse
    {
        $post->delete();
        if (auth()->user()->is_admin == 1) {
            return  redirect()->route("admin.index");
        }
        return redirect()->route("dashboard");

    }



    public function manage(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = auth()->user()->posts()->get();
        return view("posts.manage",compact("posts"));
    }
}
