<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Acessorio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VeiculosController extends Controller
{
    // Exibe todos os veículos
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('veiculos.index', compact('veiculos'));
    }

    // Exibe o formulário de criação de um novo veículo
    public function create()
    {
        $acessorios = Acessorio::all();
        $categorias = Categoria::all();
        return view('veiculos.create', compact('acessorios', 'categorias'));
    }

    // Salva o novo veículo no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados do veículo
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'valor_locacao' => 'required|numeric',
            'seminovo' => 'required|string',
            'locacao' => 'required|string',
            'ativo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'acessorios' => 'nullable|array',
            'acessorios.*' => 'exists:acessorios,id',
            'imagens.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação das imagens
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'seminovo.required' => 'O campo seminovo é obrigatório.',
            'locacao.required' => 'O campo locação é obrigatório.',
            'ativo.required' => 'O campo ativo é obrigatório.',
            'categoria_id.required' => 'A categoria é obrigatória.',
            'imagens.*.image' => 'Cada arquivo deve ser uma imagem.',
            'imagens.*.mimes' => 'As imagens devem estar nos formatos: jpeg, png, jpg ou gif.',
        ]);

        // Criação do veículo no banco de dados
        $veiculo = Veiculo::create([
            'nome' => $validatedData['nome'],
            'valor_locacao' => $validatedData['valor_locacao'],
            'seminovo' => $validatedData['seminovo'],
            'locacao' => $validatedData['locacao'],
            'ativo' => $validatedData['ativo'],
            'categoria_id' => $validatedData['categoria_id'],
            'imagem' => '', // Inicializando com string vazia
        ]);

        // Upload da imagem, se houver
        if ($request->hasFile('imagens')) {
            $imagem = $request->file('imagens')[0]; // Pega apenas a primeira imagem
            $nomeImagem = $imagem->getClientOriginalName(); // Obtém o nome original da imagem
            $imagem->storeAs('images', $nomeImagem, 'public'); // Salva a imagem no diretório 'public/images'

            // Salva apenas o nome da imagem no banco de dados
            $veiculo->imagem = $nomeImagem;
            $veiculo->save();
        }

        // Relacionamento com acessórios, se houver
        if ($request->has('acessorios')) {
            $veiculo->acessorios()->sync($validatedData['acessorios']);
        }

        return redirect()->route('veiculos.index')->with('success', 'Veículo criado com sucesso!');
    }

    // Exibe os detalhes de um veículo
    public function show($id)
    {
        $veiculo = Veiculo::with(['categoria', 'acessorios'])->findOrFail($id);
        return view('veiculos.show', compact('veiculo'));
    }

    // Exibe o formulário de edição do veículo
    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $acessorios = Acessorio::all();
        $categorias = Categoria::all();
        return view('veiculos.edit', compact('veiculo', 'categorias', 'acessorios'));
    }

    // Atualiza o veículo no banco de dados
    public function update(Request $request, $id)
    {
        // Validação dos dados do veículo
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'valor_locacao' => 'required|numeric',
            'seminovo' => 'required|string',
            'locacao' => 'required|string',
            'ativo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagens.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação das imagens
        ]);

        $veiculo = Veiculo::findOrFail($id);

        // Atualiza os dados do veículo
        $veiculo->update([
            'nome' => $validatedData['nome'],
            'valor_locacao' => $validatedData['valor_locacao'],
            'seminovo' => $validatedData['seminovo'],
            'locacao' => $validatedData['locacao'],
            'ativo' => $validatedData['ativo'],
            'categoria_id' => $validatedData['categoria_id'],
        ]);

        // Atualiza a imagem, se houver
        if ($request->hasFile('imagens')) {
            // Exclui a imagem antiga, se existir
            if ($veiculo->imagem) {
                Storage::disk('public')->delete('images/' . $veiculo->imagem); // Exclui a imagem anterior
            }

            // Salva a nova imagem
            $imagem = $request->file('imagens')[0]; // Pega a primeira imagem
            $nomeImagem = $imagem->getClientOriginalName(); // Obtém o nome original da imagem
            $imagem->storeAs('images', $nomeImagem, 'public'); // Salva a nova imagem

            // Atualiza o nome da imagem no banco de dados
            $veiculo->imagem = $nomeImagem;
            $veiculo->save();
        }

        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    // Exclui um veículo
    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        // Exclui a imagem associada, se existir
        if ($veiculo->imagem) {
            Storage::disk('public')->delete('images/' . $veiculo->imagem); // Exclui a imagem
        }

        // Exclui o veículo
        $veiculo->delete();

        return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso!');
    }
}