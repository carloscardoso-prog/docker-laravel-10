<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome_cliente',
        'email_cliente',
        'endereco_cliente',
        'logradouro_cliente',
        'cep_cliente',
        'bairro_cliente',
    ];

}
