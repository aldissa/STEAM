<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        
        // $user = new User();
        // $user->username = 'admin';
        // $user->email = 'a@gmail.com';
        // $user->password = bcrypt('admin');
        // $user->role = 'admin';
        // $user->save();
        
        // $user = new User();
        // $user->username = 'user';
        // $user->email = 'u@gmail.com';
        // $user->password = bcrypt('user');
        // $user->role = 'user';
        // $user->save();
        
        $user = new User();
        $user->username = 'aldi';
        $user->email = 'al@gmail.com';
        $user->password = bcrypt('al');
        $user->role = 'user';
        $user->save();

        // $kategori = new kategori();
        // $kategori->name = 'Action';
        // $kategori->save();

        // $kategori = new kategori();
        // $kategori->name = 'Adventure';
        // $kategori->save();

        // $kategori = new kategori();
        // $kategori->name = 'Strategy';
        // $kategori->save();

        // $kategori = new kategori();
        // $kategori->name = 'Sports';
        // $kategori->save();

        // $kategori = new kategori();
        // $kategori->name = 'Simulation';
        // $kategori->save();

    }
}
