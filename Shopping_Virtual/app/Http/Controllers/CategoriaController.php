<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\lojas;
use App\Models\produtos;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categoria::with('lojas','produtos')->get();
        $lojas = lojas::all();
        $produtos = produtos::all();
        
        return view('categorias.index', compact('categorias','lojas','produtos'));
    }


    // Exibe o formulário para criar uma nova categoria
    public function create()
    {
        //return view('categorias.create');
        $produtos = produtos::all();  // Definindo a variável $produtos
        return view('categorias.create', compact('produtos'));  // Passando para a view
    }

    // Armazena uma nova categoria no banco de dados
    public function store(Request $request)
    {
        
        $categoria = new categoria();
        $categoria->nome = $request->input('nome');
        $categoria->produto_id = $request->input('produto_id');
        $categoria ->imagem=$request->file('imagem')->store('icones', 'public');

        // Salvando a loja no banco de dados
        $categoria->save();
        
        // Cria a categoria
        
        return redirect()->route('categoria.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Exibe os detalhes de uma categoria específica
    public function show($id)
    {
         // Encontre a categoria com o ID e carregue as lojas associadas
         $categoria = Categoria::with('lojas')->findOrFail($id);

         // Retorna a view com a categoria e suas lojas
         return view('categorias.show', compact('categoria'));
        
    }

    // Exibe o formulário para editar uma categoria existente
    public function edit($id)
    {
        $categoria = categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    // Atualiza uma categoria existente
    public function update(Request $request, $id)
    {
        // Validação de dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        // Atualiza a categoria
        $categoria = categoria::findOrFail($id);
        $categoria->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('categoria.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Remove uma categoria do banco de dados
    public function destroy($id)
    {
        $categoria = categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
