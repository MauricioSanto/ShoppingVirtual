<?php

namespace App\Http\Controllers;

use App\Models\produtos;
use App\Models\lojas;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = produtos::with('lojas')->get();
        $lojas = lojas::all();
        
        return view('loja.index', compact('produtos','lojas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loja.create');
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
        return redirect()->route('loja.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(produtos $produtos)
    {
        //
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
