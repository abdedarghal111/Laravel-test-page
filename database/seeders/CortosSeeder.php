<?php

namespace Database\Seeders;

use App\Models\Cortos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CortosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cortos::factory()->count(10)->create();
    }
}
