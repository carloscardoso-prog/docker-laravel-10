<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
            
            'nome_produto' => 'Carro Bonito',
            'tipo_produto' => 'Veículo Automotivo',
            'valor' => '50000.00',
        ]);
    }
}
