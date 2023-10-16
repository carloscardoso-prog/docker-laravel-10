<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public $venda;
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }
    public function index(FormRequestVenda $request)
    {
        $parametroBusca = $request->pesquisar;
        $listarVenda = $this->venda->getVendasPesquisarIndex(search: $parametroBusca ?? '');
        return view('pages.venda.paginacao', compact('listarVenda'));
    }

    public function cadastrarVenda(FormRequestVenda $request)
    {
        if ($request->method() == "POST") {

            $objetoCriar = $request->all();

            Venda::create($objetoCriar);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('venda.index');
        }

        return view('pages.venda.create');
    }
}
