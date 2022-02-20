<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Discussao;
use App\Models\DiscussaoCategoria;
use App\Models\DiscussaoComentario;
use App\Models\Jogo;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        Usuario::create([
            'name' => 'usuario',
            'email' => 'usuario@usuario',
            'username' => 'usuario',
            'password' => '123',
        ]);

        Jogo::insert([
            ['name' => "League of Legends"],
            ['name' => "Combat Arms"],
            ['name' => 'Grand Theft Auto V'],
            ['name' => 'Rainbow Six Siege'],
            ['name' => 'Grand Theft Auto V'],
            ['name' => 'Counter-Strike: Global Offensive'],
            ['name' => 'Red Dead Redemption'],
            ['name' => 'The Witcher 3: Wild Hunt'],
            ['name' => 'Minecraft'],
            ['name' => 'Batman Arkham City'],
            ['name' => 'Super Mario Odyssey'],
            ['name' => 'The Last of Us'],
            ['name' => 'God Of War'],
            ['name' => 'Doom'],
            ['name' => 'Portal 1'],
            ['name' => 'Portal 2'],
            ['name' => 'Half Life 1'],
            ['name' => 'Half Life 2'],
            ['name' => 'Quake 1'],
            ['name' => 'Quake 2'],
        ]);

        Categoria::insert([
            ['name' => 'Sandbox'],
            ['name' => 'Real Time Strategy'],
            ['name' => 'First Person Shooter'],
            ['name' => 'Third Person Shooter'],
            ['name' => 'Multiplayer online battle arena'],
            ['name' => 'Role-playing'],
            ['name' => 'Simulation'],
            ['name' => 'Sports'],
            ['name' => 'Action-adventure'],
            ['name' => 'Survival'],
            ['name' => 'Platformer'],
        ]);

        $discussao = Discussao::create([
            'titulo' => 'Discussão 1',
            'texto' => 'Discussão 1',
            'jogo_id' => 6
        ]);

        DiscussaoCategoria::create([
            'discussao_id' => $discussao->id,
            'categoria_id' => 1
        ]);

        DiscussaoCategoria::create([
            'discussao_id' => $discussao->id,
            'categoria_id' => 2
        ]);

        DiscussaoComentario::create([
            'discussao_id' => $discussao->id,
            'user_id' => 1,
            'texto' => 'Comentario Muito Legal'
        ]);
        DiscussaoComentario::create([
            'discussao_id' => $discussao->id,
            'user_id' => 1,
            'texto' => 'Comentario Muito Legal 2'
        ]);
    }
}
