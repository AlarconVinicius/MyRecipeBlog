<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;

use App\Models\Image;
use App\Models\Category;
use App\Models\Difficulty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["titulo", "slug", "resumo", "conteudo", "tempo_preparo", "qtd_porcao", "user_id", "category_id", "difficulty_id", "approved"];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }

    public function image()
    { 
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }
}
