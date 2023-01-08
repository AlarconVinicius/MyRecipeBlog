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
        
        if(request('search')){
            $search = request('search');
            $posts = Post::where('titulo', 'LIKE', "%$search%");

            $page_section_title = $search;
            $main_section_title = $search;
            
            $posts = $posts->paginate(10);

            $latest_posts = Post::latest()->take(3)->get();
            $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
            $tags = Tag::latest()->take(20)->get();

            return view('search', [
                'page_section_title' => $page_section_title,
                'main_section_title' => $main_section_title,
                'posts' => $posts,
                'latest_posts' => $latest_posts,
                'categories' => $categories,
                'tags' => $tags,
                'search' => $search
            ]);
                // ->orWhere('category_id', 'LIKE', "%$search%");
        }
        $posts = Post::orderBy('id', 'desc')->paginate(12);
        $latest_posts = Post::latest()->orderBy('views', 'desc')->orderBy('id', 'desc')->take(5)->get();
        // dd($latest_postss[0]->id);
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
