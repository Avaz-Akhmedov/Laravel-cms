<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RegisteredUsersController;



//ADMIN ROUTE
Route::group(["middleware" => ["admin","auth"],"prefix" => "admin"],function () {
    Route::get("/",[AdminController::class,"index"])->name("admin.index");
    Route::get("/users",[RegisteredUsersController::class,"index"])->name("admin.users.index");
    Route::get("/users/{user}/edit",[RegisteredUsersController::class,"edit"])->name("admin.user.edit");
    Route::patch("/users/{user}/edit",[RegisteredUsersController::class,"update"])->name("admin.user.update");
    Route::delete("/users/{user}",[RegisteredUsersController::class,"destroy"])->name("admin.user.destroy");
    Route::get("/users/{user}/posts",[RegisteredUsersController::class,"manage"])->name("admin.user.posts.manage");
});




//HOME ROUTE
Route::get('/',HomeController::class)->name("home.index");
Route::get("/posts",[PostsController::class,"index"])->name("index");



//POSTS ROUTE
Route::group(["middleware" => "auth", "prefix" => "posts" ],function () {
    Route::get("/manage",[PostsController::class,"manage"])->name("posts.manage");
    Route::view("/create","posts.create")->name("post.create");
    Route::post("/create",[PostsController::class,"store"])->name("post.store");
    Route::get("/{post}/edit",[PostsController::class,"edit"])->name("post.edit");
    Route::patch("/{post}/edit",[PostsController::class,"update"])->name("post.update");
    Route::delete("/{post}",[PostsController::class,"destroy"])->name("post.destroy");
});

Route::get("/posts/{post}",[PostsController::class,"show"])->name("post.show");




//AUTH ROUTE
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', "dashboard")->name("dashboard");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
