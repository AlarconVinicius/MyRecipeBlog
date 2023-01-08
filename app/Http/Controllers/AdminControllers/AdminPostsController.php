<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Tag;
use App\Models\Post;

use App\Models\Category;
use App\Models\Difficulty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPostsController extends Controller
{
    private $rules = [
        'titulo' => 'required|max:200',
        'slug' => 'required|max:200',
        'resumo' => 'required|max:1000',
        'conteudo' => 'required',
        'tempo_preparo' => 'required|numeric',
        'qtd_porcao' => 'required|numeric',
        'category_id' => 'required|numeric',
        'difficulty_id' => 'required|numeric',
        'capa_post' => 'required|file|mimes:jpg,png',
        // 'capa_post' => 'required|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=300',
    ];

    public function index()
    {
        $page_section_title = "Posts";
        $main_section_title = "Todos os Post";
        $posts = Post::with('category')->orderBy('id', 'DESC')->paginate(15);
        return view('admin_dashboard.posts.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'posts' => $posts,
        ]);
    }

    
    public function create()
    {
        $page_section_title = "Add Post";
        $main_section_title = "Adicionar Post";

        $categories = Category::pluck('nome', 'id');
        $difficulties = Difficulty::pluck('nome', 'id');

        return view('admin_dashboard.posts.create', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'categories' => $categories,
            'difficulties' => $difficulties,
        ]);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);
        $capa_post = $request->file('capa_post');
        // dd($capa_post);
        if($request->has('capa_post'))
        {
            $capa_post = $request->file('capa_post');
            $filename = $capa_post->getClientOriginalName();
            $file_extension = $capa_post->getClientOriginalExtension();
            $path = $capa_post->store('/post_img', 'public');
            
            $post->image()->create([
                'nome' => $filename,
                'extensao' => $file_extension,
                'path' => $path
            ]);
            // dd($capa_post);

        }
        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach($tags as $tag){
            $tag_obj = Tag::create(['nome' => trim($tag)]);
            $tags_ids[] = $tag_obj->id;
        }
        
        if(count($tags_ids) > 0)
            $post->tags()->sync( $tags_ids );

        return redirect()->route('admin.posts.create')->with('success', 'Post criado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        $page_section_title = "Edit Post";
        $main_section_title = "Editar Post";

        $categories = Category::pluck('nome', 'id');
        $difficulties = Difficulty::pluck('nome', 'id');

        $tags = '';
        foreach($post->tags as $key => $tag) {
            $tags .= $tag->nome;
            if($key !== count($post->tags) -1) {
                $tags.= ', ';
            }
        }

        return view('admin_dashboard.posts.edit',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'post' => $post,
            'tags' => $tags,
            'categories' => $categories,
            'difficulties' => $difficulties,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->rules['capa_post'] = 'nullable|file|mimes:jpg,png';
        $validated = $request->validate($this->rules);

        $post->update($validated);

        if($request->has('capa_post'))
        {
            $capa_post = $request->file('capa_post');
            $filename = $capa_post->getClientOriginalName();
            $file_extension = $capa_post->getClientOriginalExtension();
            $path = $capa_post->store('/post_img', 'public');

            $post->image()->update([
                'nome' => $filename,
                'extensao' => $file_extension,
                'path' => $path
            ]);

        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach($tags as $tag){
            $tag_exist = $post->tags()->where('nome', trim($tag) )->count();
            if($tag_exist == 0) {
                $tag_obj = Tag::create(['nome' => trim($tag)]);
                $tags_ids[] = $tag_obj->id;
            }
        }
        
        if(count($tags_ids) > 0)
            $post->tags()->syncWithoutDetaching( $tags_ids );

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post atualizado com sucesso!');
    }
    
    public function destroy(Post $post)
    {
        $post->tags()->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deletado com sucesso!');;
    }
}
