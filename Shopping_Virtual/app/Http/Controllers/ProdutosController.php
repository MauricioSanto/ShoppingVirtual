<?php

namespace App\Http\Controllers;

use App\Models\produtos;
use App\Models\lojas;
use App\Models\categoria;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = produtos::with('lojas','categoria')->get();
        $lojas = lojas::all();
        $categorias = categoria::all();
        
        return view('produto.index', compact('produtos','lojas','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao'=>'text',
            'preco'=>'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

        produtos::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         // Encontrar o Produto pelo ID
         $produto = Produtos::findOrFail($id);

         // Retornar a view com os detalhes do produto
         return view('produto.show', compact('produto'));

         return view('produtos.detalhes', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produtos $produtos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produtos $produtos)
    {
        //
    }
}
