<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosPruebaSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            ['name' => 'Administrador', 'email' => 'admin@uatf.edu.bo', 'rol' => 'admin'],
            ['name' => 'Ana Dueña', 'email' => 'ana@uatf.edu.bo', 'rol' => 'usuario'],
            ['name' => 'Luis Otro', 'email' => 'luis@uatf.edu.bo', 'rol' => 'usuario'],
            ['name' => 'Carla Normal', 'email' => 'carla@uatf.edu.bo', 'rol' => 'usuario'],
        ];

        foreach ($usuarios as $datos) {
            $user = User::firstOrNew(['email' => $datos['email']]);
            $user->name = $datos['name'];
            $user->password = Hash::make('password');
            $user->email_verified_at = now();
            $user->rol = $datos['rol']; // asignación explícita
            $user->save();
        }
    }
}
