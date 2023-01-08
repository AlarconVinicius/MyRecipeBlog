<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $page_section_title = "Categorias";
        $main_section_title = "Categorias: ";
        $latest_posts = Post::latest()->take(5)->get();
        return view('categories.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'categories' => Category::withCount('posts')->orderBy('posts_count', 'desc')->paginate(50),
            'latest_posts' => $latest_posts,
        ]);
    }    

    function show(Category $category)
    {
        $page_section_title = $category->nome;
        $main_section_title = $category->nome;
        
        $posts = $category->posts()->paginate(5);

        $latest_posts = Post::latest()->take(3)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(20)->get();
        return view('categories.show', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'posts' => $posts,
            'latest_posts' => $latest_posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }    
}
