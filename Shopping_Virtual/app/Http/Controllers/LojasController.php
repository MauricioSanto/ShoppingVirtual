<?php

namespace App\Http\Controllers;

use App\Models\lojas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lojas = lojas::with('User')->get();
        $users = User::all();
        
        return view('loja.index', compact('lojas','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lojas = lojas::with('User')->get();
        $users = User::all();
        return view('loja.create',compact('lojas','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'categoria' => 'required|string|max:255',
            'cnpj' => 'required|digits:14|unique:lojas,cnpj',
            'user_id' => 'required|exists:users,id'
            
        ]);

        $loja = new Lojas();
        $loja->nome = $request->input('nome');
        $loja->categoria = $request->input('categoria');
        $loja->cnpj = $request->input('cnpj');
    
        // Associa automaticamente o user_id ao usuário autenticado
       // $loja->user_id = auth()->user()->id;
        $loja->user_id = Auth::user()->id;
        // Salvando a loja no banco de dados
        $loja->save();
    
        // Redirecionar ou retornar resposta
        return redirect()->route('loja.index')->with('success', 'Loja criada com sucesso!');

       // lojas::create($request->all());
        //return redirect()->route('loja.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(lojas $lojas)
    {
        //
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
    public function destroy(lojas $lojas)
    {
        //
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
