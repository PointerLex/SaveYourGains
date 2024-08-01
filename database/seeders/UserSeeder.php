<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear múltiples usuarios de prueba usando la fábrica
        User::factory(10)->create();

        // Crear un usuario específico
        User::create([
            'name' => 'Test User',
            'surname' => 'Example',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'password' => Hash::make('password123'),
        ]);
    }
}
