<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProdutosSeeder::class
        ]);

        $this->call([
            ClientesSeeder::class
        ]);

        $this->call([
            VendasSeeder::class
        ]);
    }
}
