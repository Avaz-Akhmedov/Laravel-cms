<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
class PostController extends Controller
{
    public function welcome(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Posts::latest()->take(3)->get();
        return view("posts.welcome",compact("posts"));
    }
    public function index()
    {
        $posts =  Posts::all();
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

         return redirect()->route("index");
    }
}
