<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class PostsController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::query()->latest()->scopes(['filter'])->get();
        $categories = Category::all();


        return view("posts.index", compact("posts", "categories"));
    }


    public function show(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("posts.show", compact("post"));
    }


    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("posts.create", compact("categories", "tags"));
    }


    public function store(StorePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $fields = $request->validated();
            $fields["user_id"] = auth()->id();


            if ($image = $request->file("image")) {
                $image_name = time() . "-" . $image->getClientOriginalName() . "." . $image->getClientOriginalExtension();
                $image_path = $image->storeAs("images", $image_name, "public");
                $fields["image"] = "/storage/" . $image_path;
            }

            $post = Post::query()->create($fields);

            $tags = collect($fields["tags"])
                ->map(fn(string $tag_name) => Tag::query()->firstOrCreate(['name' => $tag_name])->id);

            $post->tags()->attach($tags);
        });

        return redirect()->route("dashboard");
    }


    public function edit(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $post->load(['category', 'tags']);
        $categories = Category::all();
        $tags = Tag::all();
        return view("posts.edit", compact("post", 'categories', 'tags'));

    }


    public function update(Post $post, PostUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {

        DB::transaction(function () use ($post, $request) {
            $fields = $request->validated();
            $fields["user_id"] = auth()->id();

            foreach ($fields["tags"] as $key => $tag) {
                $newTag = Tag::query()->firstOrCreate(['name' => $tag]);
                $fields['tags'][$key] = $newTag->id;
            }

            $post->tags()->sync($fields["tags"]);


            if ($image = $request->file("image")) {
                Storage::delete($post->image);
                $image_name = time() . "-" . $image->getClientOriginalName() . "." . $image->getClientOriginalExtension();
                $image_path = $image->storeAs("images", $image_name, "public");
                $fields["image"] = "/storage/" . $image_path;
            }

            $post->update($fields);
        });


        return auth()->user()->is_admin == 1 ?
            redirect()->route("admin.index") :
            redirect()->route("posts.manage");

    }


    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {

        DB::transaction(function () use ($post) {
            $post->tags()->detach();
            $post->delete();
        });

        return auth()->user()->is_admin == 1 ?
            redirect()->route("admin.index") :
            redirect()->route("posts.manage");

    }


    public function manage(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = auth()->user()->posts()->get();
        return view("posts.manage", compact("posts"));
    }
}
