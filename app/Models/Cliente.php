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
        'cep',
        'bairro_cliente',
    ];

    public function getClientesPesquisarIndex(string $search = ''){
        $cliente = $this->where(function($query) use ($search) {
            if($search) {
                $query->where('nome_cliente', "'". $search ."'");
                $query->orWhere('nome_cliente', 'LIKE', "%{$search}%");
            }
        })->get();

        return $cliente;
    }
}
