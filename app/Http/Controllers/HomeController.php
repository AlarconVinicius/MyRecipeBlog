<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $page_section_title = "Início";
        $main_section_title = "ÚLTIMAS RECEITAS";
        
        $posts = Post::paginate(10);
        $latest_posts = Post::latest()->take(3)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(20)->get();
        return view('home', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'posts' => $posts,
            'latest_posts' => $latest_posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
