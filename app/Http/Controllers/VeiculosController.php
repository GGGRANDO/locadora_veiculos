<?php

namespace App\Http\Controllers;
use App\Models\Veiculo;


use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('veiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'locacao' => 'required|in:S,N',
            'seminovo' => 'required|in:S,N',
            'ativo' => 'required|in:S,N',
            'categoria' => 'required|in:S,N',
            'acessorio' => 'required|in:S,N',
        ], [
            'nome.required' => 'O nome é obrigatório.', 
            'ativo.required' => 'O campo ativo deve ser preenchido.', 
            'ativo.in' => 'O valor do campo ativo deve ser Sim (S) ou Não (N).',
        ]);
        
        Veiculo::create($validatedData);
        
        return redirect()->route('veiculos.index')->with('success', 'Veiculo criado com sucesso!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return view('veiculos.show', compact('veiculo'));
    }

    public function edit($id)
    {
        $veiculos = Veiculo::find($id);
        return view('veiculos.edit', compact('veiculos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->nome = $request->input('nome');
        $veiculo->ativo = $request->input('ativo');
        
        $veiculo->save();

        return redirect()->route('veiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();
        return redirect()->route('veiculos.index');
    }
}