<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
class Post extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "title", "content", "image","category_id"];


    public function scopeFilter($query, array $filters)
    {
        if ($filters["tag"] ?? false) {
            $query->where("tags", "like", "%" . request("tag") . "%");
        }


        if ($filters["search"] ?? false) {
            $query->where(function ($query) {
                $query
                    ->where("title", "like", "%" . request("search") . "%")
                    ->orWhere("content", "like", "%" . request("search") . "%")
                    ->orWhere("category", "like", "%" . request("search") . "%")
                    ->orWhere("tags", "like", "%" . request("search") . "%");
            });

        }
    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }



    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }



    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class,"tags","tag_id","post_id");
    }


}
