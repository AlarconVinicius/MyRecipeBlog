<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.blog-auth');
        // return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $validated = $request->validate($this->rules);
    //     // $validated['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
    //     $validated['password'] = Hash::make($request->input('password'));
    //     $user = User::create($validated);

    //     if($request->has('image'))
    //     {
    //         $image = $request->file('image');
    //         $filename = $image->getClientOriginalName();
    //         $file_extension = $image->getClientOriginalExtension();
    //         $path = $image->store('images', 'public');

    //         $user->image()->create([
    //             'nome' => $filename,
    //             'extensao' => $file_extension,
    //             'path' => $path
    //         ]);
    //     }
        
    //     return redirect()->route('admin.users.create')->with('success', 'Usuário criado com sucesso!');
    // }
    public function store(Request $request)
    {
        $role = Role::where('nome', '=', 'usuário')->first();
        if($role == null)
        {
            $role = Role::create(['nome' => 'usuário']);
            $role_id = $role->id;
        }
        else{
            $role_id = $role->id;
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role_id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
