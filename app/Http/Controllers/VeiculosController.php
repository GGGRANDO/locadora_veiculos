<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculos;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculos::all();
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
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'seminovo' => 'required|in:S,N',
            'ativo' => 'required|in:S,N',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Criação do novo veículo
        $veiculo = new Veiculos();
        $veiculo->nome = $request->input('nome');
        $veiculo->seminovo = $request->input('seminovo');
        $veiculo->ativo = $request->input('ativo');

        // Se você quiser lidar com as imagens, adicione a lógica aqui

        $veiculo->save();

        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implementar a lógica para editar um veículo, se necessário
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implementar a lógica para atualizar um veículo, se necessário
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implementar a lógica para remover um veículo, se necessário
    }
}
