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
        $produtos = produtos::with('loja','categoria')->get();
        $lojas = lojas::all();
        $categorias = categoria::all();
        
        return view('Produto.index', compact('produtos','lojas','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($loja_id )
    {
        //return view('produto.create');

         // Capturando o ID da loja passada pela URL
    //$lojas_id = $request->query('lojas_id'); // Recebe o 'lojas_id' da URL

    // Obter a loja ou redirecionar caso não exista
    $loja = lojas::findOrFail($loja_id);
    $categorias = categoria::all();

     // Verificando se a loja existe
     //$loja = lojas::findOrFail($lojas_id);

    // Passar a loja para a view de criação de produto
    return view('Produto.create', compact('loja','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        // Criando o produto
        $produto = new produtos();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->imagem = $request->file('imagem')->store('imagens', 'public');
        $produto->lojas_id = $request->lojas_id; // Associando o produto à loja
        $produto->categoria_id = $request->categoria_id; // Associando o produto à categoria
        $produto->save();
        //produtos::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         // Encontrar o Produto pelo ID
         $produto = produtos::findOrFail($id);

         // Retornar a view com os detalhes do produto
         return view('Produto.index', compact('produto'));

         //return view('produtos.detalhes', compact('produto'));
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
    public function destroy($id)
    {
        $produto = produtos::find($id);
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
