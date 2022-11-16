<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->string("title");
            $table->longText("content");
            $table->string("category");
            $table->string("tags");
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};