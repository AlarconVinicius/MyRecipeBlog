<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        //
    }    

    function show(Tag $tag)
    {
        $page_section_title = $tag->nome;
        $main_section_title = $tag->nome;
        
        $posts = $tag->posts()->paginate(10);

        $latest_posts = Post::latest()->take(3)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(20)->get();

        return view('tags.show', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'posts' => $posts,
            'latest_posts' => $latest_posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }       
}
