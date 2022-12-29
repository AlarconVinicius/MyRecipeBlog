<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key constraints for users and enable it again
        Schema::disableForeignKeyConstraints();

        \App\Models\User::truncate();
        \App\Models\Role::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();
        \App\Models\Image::truncate();
        \App\Models\Difficulty::truncate();

        Schema::enableForeignKeyConstraints();

        // Create roles and users
        \App\Models\Role::factory(1)->create(['nome' => 'administrador']);
        \App\Models\Role::factory(1)->create(['nome' => 'editor']);
        \App\Models\Role::factory(1)->create(['nome' => 'usuário']);

        $blog_routes = Route::getRoutes();
        $permissions_ids = [];
        foreach($blog_routes as $route)
        {
            if(strpos($route->getName(), 'admin') !== false)
            {
                $permission = \App\Models\Permission::create(['nome' => $route->getName()]);
                $permissions_ids[] = $permission->id; 
            }
        }

        \App\Models\Role::where('nome', 'administrador')->first()->permissions()->sync($permissions_ids);

        \App\Models\User::factory(1)->create([
            'first_name' => 'Nome Padrão',
            'last_name' => 'Sobrenome Padrão',
            'full_name' => 'Nome Completo Padrão',
            'email' => 'padrao@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // bcrypt('password')
            'remember_token' => Str::random(10),
            'role_id' => Role::where('nome', 'administrador')->first()->id
        ]);

        // Create categories and difficulties
        \App\Models\Category::factory()->create(['nome' => 'Sem Categoria', 'slug' => 'sem-categoria']);
        \App\Models\Difficulty::factory(1)->create(['nome' => 'Fácil']);
        \App\Models\Difficulty::factory(1)->create(['nome' => 'Médio']);
        \App\Models\Difficulty::factory(1)->create(['nome' => 'Difícil']);

        \App\Models\Setting::factory(1)->create();
    }
}
