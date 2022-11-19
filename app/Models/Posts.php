<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","title","content","category","tags","image"];

    public static function create(mixed $fields)
    {
    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
