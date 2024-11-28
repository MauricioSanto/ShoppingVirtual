<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\lojas;
use App\Models\User;
use App\Models\produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lojas = lojas::with('User','categoria','produtos')->get();
        $users = User::all();
        $categorias = categoria:: all();
        $produtos = produtos:: all();
        
        return view('loja.index', compact('lojas','users','categorias','produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lojas = lojas::with('User','categoria','produtos')->get();
        $users = User::all();
        $categorias = categoria::all();
        $produtos = produtos::all();
       
        return view('loja.create',compact('lojas','users','categorias','produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        // Validação dos dados de entrada
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:lojas,cnpj',
            'categoria_id' => 'required|exists:categorias,id', // Supondo que você tem uma tabela categorias
            'produto_id' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif', // Valida o tipo de arquivo de logo
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string|max:500',
        ]);

        // Criação da loja
        $loja = new lojas();
        $loja->logo = $request->file('logo')->store('icones', 'public');
        $loja->nome = $request->input('nome');
        $loja->cnpj = $request->input('cnpj');
        $loja->categoria_id = $request->input('categoria_id');
        //$loja->produto_id = $request->input('produto_id');
        $loja->user_id = Auth::user()->id; // Associa automaticamente ao usuário logado

        // Salvando a loja primeiro
        $loja->save();

        dd($loja->id);
        // Retorna ao índice de lojas com uma mensagem de sucesso
        return redirect()->route('produto.create', ['loja_id' => $loja->id]);
        //return redirect()->route('loja.index')->with('success', 'Loja  criada  com sucesso!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         // Encontrar a loja pelo ID
         //$loja = Lojas::findOrFail($id);

         // Retornar a view com os detalhes da loja
         //return view('loja.show', compact('loja'));
           // Recupera a loja com o id fornecido
        $loja = Lojas::findOrFail($id);

        // Recupera todos os produtos da loja
        $produtos = $loja->produtos;  // Utiliza o relacionamento para buscar os produtos

        // Passa a loja e os produtos para a view
        return view('lojas.show', compact('loja', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lojas $lojas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lojas $lojas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loja = lojas::find($id);
        $loja->delete();
        return redirect()->route('loja.index')->with('success', 'Cliente removido com sucesso.');
    }
    public function showProdutos($id)
    {
        $loja = Lojas::findOrFail($id);
        $produtos = $loja->produtos; // Obtém todos os produtos da loja

        return view('Produto.index', compact('loja', 'produtos'));
    }
    /** Método para buscar produtos por categoria ou nome
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Busca lojas e produtos que correspondem à consulta
        $stores = Store::with('products')
            ->where('name', 'like', "%{$query}%")
            ->orWhereHas('products', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->get();

        // Retorna a view com os resultados da busca
        return view('shop.index', compact('stores'));
    }*/

}
