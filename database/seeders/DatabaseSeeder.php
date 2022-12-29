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
        \App\Models\Tag::truncate();
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
            'first_name' => 'Vinícius',
            'last_name' => 'Alarcon',
            'full_name' => 'Vinícius Alarcon',
            'email' => 'alarcon@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // bcrypt('password')
            'remember_token' => Str::random(10),
            'role_id' => Role::where('nome', 'administrador')->first()->id
        ]);
        \App\Models\User::factory(1)->create([
            'first_name' => 'Camila',
            'last_name' => 'Vianna',
            'full_name' => 'Camila Vianna',
            'email' => 'vianna@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // bcrypt('password')
            'remember_token' => Str::random(10),
            'role_id' => Role::where('nome', 'usuário')->first()->id
        ]);
        $users = \App\Models\User::all();
        foreach($users as $user) {
            // dd($user->image());
            $user->image()->save(\App\Models\Image::factory()->make() );
        }

        // Create categories, tags and difficulties
        \App\Models\Category::factory()->create(['nome' => 'Sem Categoria', 'slug' => 'sem-categoria']);
        \App\Models\Category::factory(5)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Difficulty::factory(1)->create(['nome' => 'Fácil']);
        \App\Models\Difficulty::factory(1)->create(['nome' => 'Médio']);
        \App\Models\Difficulty::factory(1)->create(['nome' => 'Difícil']);


        // Create posts
        $posts = \App\Models\Post::factory(65)->create();
        foreach($posts as $post) {
            $tags_ids = [];
            $tags_ids[]  = \App\Models\Tag::all()->random()->id;
            $tags_ids[]  = \App\Models\Tag::all()->random()->id;
            $tags_ids[]  = \App\Models\Tag::all()->random()->id;

            $post->tags()->sync( $tags_ids );
            $post->image()->save(\App\Models\Image::factory()->make() );
        }
        
        \App\Models\Setting::factory(1)->create();
    }
}
