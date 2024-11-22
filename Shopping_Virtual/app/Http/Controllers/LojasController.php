<?php

namespace App\Http\Controllers;

use App\Models\categoria;
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
        $lojas = lojas::with('User','categoria')->get();
        $users = User::all();
        $categorias = categoria:: all();
        
        return view('loja.index', compact('lojas','users','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lojas = lojas::with('User','categoria')->get();
        $users = User::all();
        $categorias = categoria::all();
       
        return view('loja.create',compact('lojas','users','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $loja = new Lojas();
        $loja ->logo=$request->file('logo')->store('icones', 'public');
        $loja->nome = $request->input('nome');
        $loja->cnpj = $request->input('cnpj');
        $loja->categoria_id = $request->input('categoria_id');
    
        // Associa automaticamente o user_id ao usuário autenticado
       
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
    public function show($id)
    {
         // Encontrar a loja pelo ID
         $loja = Lojas::findOrFail($id);

         // Retornar a view com os detalhes da loja
         return view('loja.show', compact('loja'));
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
