<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                'name' => 'carlos',
                'email' => 'charlescraft2@gmail.com',
                'password' => Hash::make('contagem1'),        
            ]
        );
    }
}
