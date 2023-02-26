<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(2)->create();
        \App\Models\User::create([
            'name' => 'Jagras',
            'email' => 'jagras@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}

