<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::All();

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
        // Validação dos dados recebidos da requisição
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'locacao' => 'required|boolean',  // Supondo que seja um campo booleano
            'seminovo' => 'required|boolean', // Supondo que seja um campo booleano
            'ativo' => 'required|in:S,N',  // Apenas valores 'S' ou 'N'
            'categoria_id' => 'required|exists:categorias,id',  // Verifica se o id da categoria existe
            'acessorio_id' => 'required|exists:acessorios,id',  // Verifica se o id do acessório existe
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'locacao.required' => 'O campo locação é obrigatório.',
            'seminovo.required' => 'O campo seminovo é obrigatório.',
            'ativo.required' => 'O campo ativo é obrigatório.',
            'categoria_id.required' => 'A categoria é obrigatória.',
            'acessorio_id.required' => 'O acessório é obrigatório.',
        ]);
    
        // Criação do novo veículo com os dados validados
        Veiculo::create($validatedData);
    
        // Redirecionamento para a página de índice com mensagem de sucesso
        return redirect()->route('veiculos.index')->with('success', 'Veículo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}