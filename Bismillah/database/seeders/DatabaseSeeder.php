<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
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
        Kelas::factory(3)->create();
        Mahasiswa::factory(3)->create();
        Matakuliah::factory(3)->create();
    }
}
