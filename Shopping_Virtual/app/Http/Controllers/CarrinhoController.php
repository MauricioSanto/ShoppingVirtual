<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // Exibe os itens no carrinho
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    // Adiciona um produto ao carrinho
    public function adicionar(Request $request)
    {
        $produto = $request->produto_id; // Supondo que você está enviando o ID do produto
        $quantidade = $request->quantidade ?? 1; // Caso não tenha sido especificada, a quantidade será 1

        // Verifica se o produto já está no carrinho
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto])) {
            // Se o produto já existir, atualiza a quantidade
            $carrinho[$produto]['quantidade'] += $quantidade;
        } else {
            // Se o produto não existir, adiciona ao carrinho
            $carrinho[$produto] = [
                'quantidade' => $quantidade,
            ];
        }

        // Atualiza o carrinho na sessão
        session()->put('carrinho', $carrinho);

        return redirect()->route('carrinho.index');
    }

    // Remove um produto do carrinho
    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);

        // Remove o item
        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
        }

        // Atualiza o carrinho na sessão
        session()->put('carrinho', $carrinho);

        return redirect()->route('carrinho.index');
    }
}
