<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todos os veículos
        $veiculos = Veiculo::all();

        // Retorna a view com os veículos
        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Carrega todas as categorias para a view
        $categorias = Categoria::all();

        // Retorna a view de criação com as categorias
        return view('veiculos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos da requisição
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'locacao' => 'required|numeric', // Supondo que seja um campo numérico
            'seminovo' => 'required|in:S,N', // Supondo que seja um campo booleano
            'ativo' => 'required|in:S,N',  // Apenas valores 'S' ou 'N'
            'categoria_id' => 'required|exists:categorias,id',  // Verifica se o id da categoria existe
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'locacao.required' => 'O campo locação é obrigatório.',
            'seminovo.required' => 'O campo seminovo é obrigatório.',
            'ativo.required' => 'O campo ativo é obrigatório.',
            'categoria_id.required' => 'A categoria é obrigatória.',
        ]);

        // Criação do novo veículo com os dados validados
        Veiculo::create([
            'nome' => $validatedData['nome'],
            'locacao' => $validatedData['locacao'],
            'seminovo' => $validatedData['seminovo'],
            'ativo' => $validatedData['ativo'],
            'categoria_id' => $validatedData['categoria_id'],
        ]);

        // Redirecionamento para a página de índice com mensagem de sucesso
        return redirect()->route('veiculos.index')->with('success', 'Veículo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Exibir detalhes de um veículo específico
        $veiculo = Veiculo::findOrFail($id);
        return view('veiculos.show', compact('veiculo'));
    }


    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
    
        $categorias = Categoria::all();
    
        return view('veiculos.edit', compact('veiculo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'locacao' => 'required|string|max:255',
            'seminovo' => 'required|in:S,N',  // Assumindo que 'S' ou 'N' são os valores válidos
            'ativo' => 'required|in:S,N',
            'categoria_id' => 'required|exists:categorias,id',  // A categoria deve existir na tabela 'categorias'
        ]);
    
        $veiculo = Veiculo::findOrFail($id);
    
        $veiculo->nome = $validatedData['nome'];
        $veiculo->locacao = $validatedData['locacao'];
        $veiculo->seminovo = $validatedData['seminovo'];
        $veiculo->ativo = $validatedData['ativo'];
        $veiculo->categoria_id = $validatedData['categoria_id'];
    
        $veiculo->save();
    
        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Deletando o veículo
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        // Redirecionar para a página de índice com mensagem de sucesso
        return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso!');
    }
}
