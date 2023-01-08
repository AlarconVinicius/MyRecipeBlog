<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        Post::find($post->id)->increment('views');
        $page_section_title = $post->titulo;

        $latest_posts = Post::latest()->orderBy('views', 'desc')->orderBy('id', 'desc')->take(3)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(20)->get();

        return view('single-post', [
            'page_section_title' => $page_section_title,
            'post' => $post,
            'latest_posts' => $latest_posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
