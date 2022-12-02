<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminRolesController extends Controller
{
    private $rules = ['nome' => 'required|unique:roles,nome|min:3|max:20'];

    public function index()
    {
        $page_section_title = "Regras";
        $main_section_title = "Regras";
        // dd($categories); 
        return view('admin_dashboard.roles.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'roles' => Role::paginate(10),
        ]);
    }

    public function create()
    {
        $page_section_title = "Add Regra";
        $main_section_title = "Adicionar Regra";

        return view('admin_dashboard.roles.create', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'permissions' => Permission::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request['nome'] = Str::lower($request['nome']);
        $validated = $request->validate($this->rules);
        $permissions = $request->input('permissions');

        $role = Role::create($validated);
        $role->permissions()->sync($permissions);

        return redirect()->route('admin.roles.create')->with('success', 'Regra criada com sucesso!');
    }

    public function edit(Role $role)
    {
        $page_section_title = "Editar Regra";
        $main_section_title = "Editar Regra";

        return view('admin_dashboard.roles.edit', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request['nome'] = Str::lower($request['nome']);
        $this->rules['nome'] = ['required', Rule::unique('roles')->ignore($role)];
        $validated = $request->validate($this->rules);
        $permissions = $request->input('permissions');
        $role->update($validated);
        $role->permissions()->sync($permissions);

        return redirect()->route('admin.roles.edit', $role)->with('success', 'Regra atualizada com sucesso!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Regra deletada com sucesso!');
    }
}
