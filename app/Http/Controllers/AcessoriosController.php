<?php

namespace App\Http\Controllers;
use App\Models\Acessorio;


use Illuminate\Http\Request;

class AcessoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acessorios = Acessorio::all();
        return view('acessorios.index', compact('acessorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acessorios.create');
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
        
        Acessorio::create($validatedData);
        
        return redirect()->route('acessorios.index')->with('success', 'Acessorio criada com sucesso!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $acessorio = Acessorio::findOrFail($id);
        return view('acessorios.show', compact('acessorio'));
    }

    public function edit($id)
    {
        $acessorios = Acessorio::find($id);
        return view('acessorios.edit', compact('acessorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $acessorio = Acessorio::findOrFail($id);
        $acessorio->nome = $request->input('nome');
        $acessorio->ativo = $request->input('ativo');
        
        $acessorio->save();

        return redirect()->route('acessorios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $acessorio = Acessorio::findOrFail($id);
        $acessorio->delete();
        return redirect()->route('acessorios.index');
    }
}