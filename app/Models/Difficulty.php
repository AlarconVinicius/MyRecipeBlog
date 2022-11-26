<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Post;

class Difficulty extends Model
{
    use HasFactory;

    protected $fillable = ["nome"];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
