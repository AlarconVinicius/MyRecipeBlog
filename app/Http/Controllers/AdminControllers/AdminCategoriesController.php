<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $rules = [
        'nome' => 'required|min:3|max:30',
        'slug' => 'required|unique:categories,slug|min:3|max:50',
    ];

    public function index()
    {
        $page_section_title = "Nova Categoria";
        $main_section_title = "Nova Categoria";
        $categories = Category::with('user')->orderBy('id', 'DESC')->paginate(50);
        // dd($categories); 
        return view('admin_dashboard.categories.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $page_section_title = "Add Categoria";
        $main_section_title = "Adicionar Categoria";

        return view('admin_dashboard.categories.create', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated["user_id"] = auth()->id(); 
        Category::create($validated);
        return redirect()->route('admin.categories.create')->with('success', 'Categoria criada com sucesso!');
    }

    public function show(Category $category)
    {
        $page_section_title = "Category1";
        $main_section_title = "$category->nome Post";
        return view('admin_dashboard.categories.show',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'category' => $category,
        ]);
    }

    public function edit(Category $category)
    {
        $page_section_title = "Category1";
        $main_section_title = "Category2";
        return view('admin_dashboard.categories.edit',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->rules['slug'] = ['required', Rule::unique('categories')->ignore($category)];
        $validated = $request->validate($this->rules);
        $category->update($validated);
        return redirect()->route('admin.categories.edit', $category)->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Category $category)
    {
        $default_category_id = Category::where('nome', 'Sem Categoria')->first()->id;
        if($category->nome === "Sem Categoria"){
            abort(404);
        }
        $category->posts()->update(['category_id' => $default_category_id]);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categoria deletada com sucesso!');
    }
}
