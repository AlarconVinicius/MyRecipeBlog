<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Difficulty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminDifficultiesController extends Controller
{
    private $rules = [
        'nome' => 'required|min:3|max:30',
        'slug' => 'required|unique:difficulties,slug|min:3|max:50',
    ];

    public function index()
    {
        $page_section_title = "Nova Dificuldade";
        $main_section_title = "Nova Dificuldade";
        $difficulties = Difficulty::orderBy('id', 'DESC')->paginate(5);
        // dd($difficulties); 
        return view('admin_dashboard.difficulties.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'difficulties' => $difficulties,
        ]);
    }

    public function create()
    {
        $page_section_title = "Add Dificuldade";
        $main_section_title = "Adicionar Dificuldade";

        return view('admin_dashboard.difficulties.create', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        Difficulty::create($validated);
        return redirect()->route('admin.difficulties.create')->with('success', 'Dificuldade criada com sucesso!');
    }

    public function show(Difficulty $difficulty)
    {
        $page_section_title = "Difficulty";
        $main_section_title = "$difficulty->nome Post";
        return view('admin_dashboard.difficulties.show',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'difficulty' => $difficulty,
        ]);
    }

    public function edit(Difficulty $difficulty)
    {
        $page_section_title = "Difficulty";
        $main_section_title = "Difficulty";
        return view('admin_dashboard.difficulties.edit',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'difficulty' => $difficulty,
        ]);
    }

    public function update(Request $request, Difficulty $difficulty)
    {
        $this->rules['slug'] = ['required', Rule::unique('difficulties')->ignore($difficulty)];
        $validated = $request->validate($this->rules);
        $difficulty->update($validated);
        return redirect()->route('admin.difficulties.edit', $difficulty)->with('success', 'Dificuldade atualizada com sucesso!');
    }

    public function destroy(Difficulty $difficulty)
    {
        $default_difficulty_id = Difficulty::where('nome', 'Não Categorizado')->first()->id;
        if($difficulty->nome === "Não Categorizado"){
            abort(404);
        }
        $difficulty->posts()->update(['difficulty_id' => $default_difficulty_id]);
        $difficulty->delete();
        return redirect()->route('admin.difficulties.index')->with('success', 'Dificuldade deletada com sucesso!');
    }
}
