<?php

namespace App\Http\Controllers;
use App\Models\Categoria;


use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255',
            'ativo' => 'required|string|max:255',
        ]);
    
        // Criando nova categoria
        $categoria = new Categoria([
            'nome' => $request->input('nome'),
            'ativo' => $request->input('ativo')
        ]);
    
        // Salvando no banco de dados
        $categoria->save();
    
        // Redirecionamento após a criação com uma mensagem de sucesso
        return redirect()->route('categorias.create')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    public function edit($id)
    {
        $categorias = Categoria::find($id);
        return view('categorias.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nome = $request->input('nome');
        $categoria->ativo = $request->input('ativo');
        
        $categoria->save();

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}