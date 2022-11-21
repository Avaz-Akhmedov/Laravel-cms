<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","title","content","category","tags","image"];


     public function scopeFilter($query,array $filters) {
         if($filters["tag"] ?? false) {
             $query->where("tags","like","%" . request("tag") . "%");
         }


       if($filters["search"] ??  false) {
           $query
               ->where("title","like","%" . request("search") . "%")
               ->orWhere("category","like","%" . request("search") . "%")
               ->orWhere("tags","like","%" . request("search") . "%");
       }
     }




    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
