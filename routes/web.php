<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(["middleware" => ["admin","auth"],"prefix" => "admin"],function () {
    Route::get("/",[AdminController::class,"index"])->name("admin.index");
});

Route::get('/',[HomeController::class,"index"])->name("welcome");
Route::get("/posts",[PostController::class,"index"])->name("index");


Route::group(["middleware" => "auth", "prefix" => "posts" ],function () {
    Route::get("/manage",[PostController::class,"manage"])->name("manage");
    Route::post("/create",[PostController::class,"store"])->name("store");
    Route::view("/create","posts.create")->name("create");
});

Route::get("/posts/{post}",[PostController::class,"show"])->name("show");





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post("/logout",[ProfileController::class,"logout"])->name("logout");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
