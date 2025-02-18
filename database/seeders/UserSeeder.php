<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (["usuario", "editor", "admin"] as $rol) {
            $user = new User();
            $user->name = $rol;
            $user->username = $rol;
            $user->rol = $rol;
            $user->email = "$rol@gmail.com";
            $user->password = "password";
            $user->save();
        }
        User::factory()->count(20)->create();
    }
}
