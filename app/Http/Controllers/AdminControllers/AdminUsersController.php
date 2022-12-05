<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    private $rules = [
        'first_name' => 'required|min:3|max:15',
        'last_name' => 'required|min:3|max:30',
        'full_name' => 'required|min:3|max:50',
        'email' => 'required|email|unique:users,email',
        'image' => 'nullable|file|mimes:jpg,png',
        'role_id' => 'required|numeric',
    ];

    public function index()
    {
        $page_section_title = "Usuários";
        $main_section_title = "Usuários";
        // dd($categories); 
        return view('admin_dashboard.users.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'users' => User::paginate(10),
        ]);
    }

    public function create()
    {
        $page_section_title = "Add Usuário";
        $main_section_title = "Adicionar Usuário";

        return view('admin_dashboard.users.create', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'roles' => Role::pluck('nome', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate($this->rules);
        // $validated['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $validated['password'] = Hash::make($request->input('password'));
        $user = User::create($validated);

        if($request->has('image'))
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');

            $user->image()->create([
                'nome' => $filename,
                'extensao' => $file_extension,
                'path' => $path
            ]);
        }
        
        return redirect()->route('admin.users.create')->with('success', 'Usuário criado com sucesso!');
    }

    public function show(User $user)
    {
        $page_section_title = "Posts: $user->full_name";
        $main_section_title = "Posts: $user->full_name";
        return view('admin_dashboard.users.show',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'user' => $user,
        ]);
    }

  
    public function edit(User $user)
    {
        $page_section_title = "Editar Usuário";
        $main_section_title = "Editar Usuário: " . $user->full_name;

        return view('admin_dashboard.users.edit', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'user' => $user,
            'roles' => Role::pluck('nome', 'id'),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->rules['password'] = 'nullable|min:3|max:20';
        $this->rules['email'] = ['required', 'email', Rule::unique('users')->ignore($user)];
        $validated = $request->validate($this->rules);

        if($validated['password'] === null) 
        {
            unset($validated['password']);
        }
        else
        {
            $validated['password'] = Hash::make($request->input('password'));
        }
        
        $user->update($validated);

        if($request->has('image'))
        {
            $image = $request->file('image');
            // dd($image);
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');

            $user->image()->update([
                'nome' => $filename,
                'extensao' => $file_extension,
                'path' => $path
            ]);
        }

        
        return redirect()->route('admin.users.edit', $user)->with('success', 'Usuário editado com sucesso!');
    }

    public function destroy(User $user)
    {
        if($user->id === auth()->id())
        {
            return redirect()->back()->with('error', 'Você não pode deletar sua própria conta!');
        }
        User::whereHas('role', function($query) {
            $query->where('nome', 'administrador');
        })->first()->posts()->saveMany( $user->posts );
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
