<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\NewsLetter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        NewsLetter::factory(500)->create();

        \App\Models\User::factory()->create([
            'last_name' => 'Ouédraogo',
            'first_name' => 'Abdoul Aziz',
            'email' => 'ao627515@gmail.com',
            'phone' => '73471085',
            'role' => 'Super Administrateur',
            'password' => Hash::make('Aziz1234'),
        ]);
    }
}
