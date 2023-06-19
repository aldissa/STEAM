<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\game;
use App\Models\kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $user = new User();
        $user->username = 'admin';
        $user->email = 'a@gmail.com';
        $user->password = bcrypt('admin');
        $user->role = 'admin';
        $user->save();
        
        $user = new User();
        $user->username = 'user';
        $user->email = 'u@gmail.com';
        $user->password = bcrypt('user');
        $user->role = 'user';
        $user->save();

        $kategori = new kategori();
        $kategori->name = 'Action';
        $kategori->save();

        $kategori = new kategori();
        $kategori->name = 'Adventure';
        $kategori->save();

        $kategori = new kategori();
        $kategori->name = 'Strategy';
        $kategori->save();

        $kategori = new kategori();
        $kategori->name = 'Sports';
        $kategori->save();

        $kategori = new kategori();
        $kategori->name = 'Simulation';
        $kategori->save();

        $game = new game();
        $game->kategori_id = 4;
        $game->foto = 'fifa.jpg';
        $game->name = 'EA SPORTS™ FIFA 23';
        $game->description = 'FIFA 23 brings The World’s Game to the pitch, with HyperMotion2 Technology, men’s and women’s FIFA World Cup™coming during the season, women’s club teams, cross-play features*, and more.';
        $game->price = 'Rp. 653.000';
        $game->save();
    }
}
