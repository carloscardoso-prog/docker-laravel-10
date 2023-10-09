<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_cliente');
            $table->string('email_cliente')->nullable();
            $table->string('endereco_cliente')->nullable();
            $table->string('logradouro_cliente')->nullable();
            $table->decimal('cep', 10, 2)->nullable();
            $table->string('bairro_cliente')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
