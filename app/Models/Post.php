<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "title", "content", "image", "category_id"];


    public function scopeFilter(Builder $query)
    {
        $search = request("search");




        $query->when($search, function (Builder $q, $search) {

            $q
                ->where("title","like","%" . $search . "%")
                ->orWhereHas("category", function (Builder $q) use ($search) {
                $q->where("name", "like", "%" . $search . "%");
            })
                ->orWhereHas("tags",function (Builder $q) use($search) {
                $q->where("name","like","%" . $search . "%");
            });

        });

    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }


    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, "post_tags", "post_id", "tag_id");
    }


}
