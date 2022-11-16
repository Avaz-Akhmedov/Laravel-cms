<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,"welcome"])->name("welcome");

Route::get("/posts",[PostController::class,"index"])->name("index");


Route::view("/posts/create","posts.create")->name("create");

Route::post("/posts/create",[PostController::class,"store"])->name("store");

Route::get("/posts/{post}",[PostController::class,"show"])->name("show");

