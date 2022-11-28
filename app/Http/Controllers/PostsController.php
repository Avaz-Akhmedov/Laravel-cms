<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $posts =  Post::latest()->filter(request(['', 'search']))->get();
        return view("posts.index",compact("posts"));
    }




    public function show(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("posts.show",compact("post"));
    }



    public function store(StorePostRequest $request): \Illuminate\Http\RedirectResponse
    {
         $fields = $request->validated();

         $fields["user_id"] = auth()->id();

         if($image = $request->file("image")) {
             $image_name = time() . "-" . $image->getClientOriginalName() . "." . $image->getClientOriginalExtension();
             $image_path = $image->storeAs("images",$image_name,"public");
             $fields["image"] = "/storage/" .$image_path;
         }

         Post::create($fields);

         return redirect()->route("dashboard");
    }


    public function edit(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("posts.edit",compact("post"));
    }

    public function update(Post $post, PostUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {


        $fields = $request->validated();



        $fields["user_id"] = auth()->id();

        if($image = $request->file("image")) {
            Storage::delete($post->image);
            $image_name = time() . "-" . $image->getClientOriginalName() . "." . $image->getClientOriginalExtension();
            $image_path = $image->storeAs("images",$image_name,"public");
            $fields["image"] = "/storage/" .$image_path;
        }




        if (auth()->user()->is_admin == 1 ) {
            return redirect()->route("admin.index");
        }

        return redirect()->route("dashboard");

    }


    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
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
