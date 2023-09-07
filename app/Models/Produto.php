<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_produto', 'valor'
    ];

    protected $guarded = [
        'tipo_produto'
    ];

    public function getProdutosPesquisarIndex(string $search = ''){
        $produto = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome_produto', $search);
                $query->orWhere('nome_produto', 'LIKE', "%{$search}%");
            }
        })->get();

        return $produto;
    }
}
