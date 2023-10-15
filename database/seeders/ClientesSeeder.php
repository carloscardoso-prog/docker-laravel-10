<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([

            'nome_cliente' => 'Carro Bonito',
            'email_cliente' => 'CarroBonito@gmail.com',
            'endereco_cliente' => 'Carro Bonito',
            'logradouro_cliente' => 'Carro Bonito',
            'cep' => '12345650',
            'bairro_cliente' => 'Carro Bonito',
        ]);
    }
}
