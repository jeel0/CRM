<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->isAdmin()->create([
            'name' => 'Nhi Banh',
            'email' => 'banh0007@algonquinlive.com',
            'password' => bcrypt('123456'),
        ]);
        User::factory()->isAdmin()->create([
            'name' => 'Jeel Asalalia',
            'email' => 'asal0003@algonquinlive.com',
            'password' => bcrypt('123456'),
        ]);
        User::factory()->isAdmin()->create([
            'name' => 'Kenechukwu Micheal',
            'email' => 'mich0267@algonquinlive.com',
            'password' => bcrypt('123456'),
        ]);
        User::factory()->isAdmin()->create([
            'name' => 'Hoa Vo',
            'email' => 'vo000059@algonquinlive.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
