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
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'ativo' => 'required|in:S,N',
        ], [
            'nome.required' => 'O nome é obrigatório.', 
            'ativo.required' => 'O campo ativo deve ser preenchido.', 
            'ativo.in' => 'O valor do campo ativo deve ser Sim (S) ou Não (N).',
        ]);
        
        Categoria::create($validatedData);
        
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
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