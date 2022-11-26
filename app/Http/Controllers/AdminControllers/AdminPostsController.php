<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Post;
use App\Models\Category;

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
        'capa_post' => 'required|file|mimes:jpg,png',
        // 'capa_post' => 'required|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=300',
    ];

    public function index()
    {
        $page_section_title = "Posts";
        $main_section_title = "Todos os Post";
        $posts = Post::with('category')->get();
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

        return view('admin_dashboard.posts.create', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'categories' => $categories,
        ]);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $validated['difficulty_id'] = 1;
        $post = Post::create($validated);

        if($request->has('capa_post'))
        {
            $capa_post = $request->file('capa_post');
            $filename = $capa_post->getClientOriginalName();
            $file_extension = $capa_post->getClientOriginalExtension();
            $path = $capa_post->store('images', 'public');

            $post->image()->create([
                'nome' => $filename,
                'extensao' => $file_extension,
                'path' => $path
            ]);

        }
        return redirect()->route('admin.posts.create')->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        $page_section_title = "Edit Post";
        $main_section_title = "Editar Post";

        $categories = Category::pluck('nome', 'id');

        return view('admin_dashboard.posts.edit',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->rules['capa_post'] = 'nullable|file|mimes:jpg,png';
        $validated = $request->validate($this->rules);
        $validated['difficulty_id'] = 1;

        $post->update($validated);

        if($request->has('capa_post'))
        {
            $capa_post = $request->file('capa_post');
            $filename = $capa_post->getClientOriginalName();
            $file_extension = $capa_post->getClientOriginalExtension();
            $path = $capa_post->store('images', 'public');

            $post->image()->update([
                'nome' => $filename,
                'extensao' => $file_extension,
                'path' => $path
            ]);

        }
        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deletado com sucesso!');;
    }
}
