<?php

namespace Database\Seeders;

use App\Models\Directores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Directores::factory()->count(20)->create();
    }
}
