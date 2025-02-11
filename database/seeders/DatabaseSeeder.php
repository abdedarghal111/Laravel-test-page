<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cortos;
use App\Models\Directores;
use App\Models\User;
use Directory;
use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Schema::disableForeignKeyConstraints();

        Cortos::truncate();
        Directores::truncate();
        User::truncate();
        
        Schema::enableForeignKeyConstraints();
        
       $this->call([
        UserSeeder::class,
        DirectoresSeeder::class,
        CortosSeeder::class
       ]);
    }
}
