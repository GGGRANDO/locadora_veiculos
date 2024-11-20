<?php
namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Acessorio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();  
        return view('veiculos.index', compact('veiculos')); 
    }
public function create()
{
    $acessorios = Acessorio::all();
    $categorias = Categoria::all();
    return view('veiculos.create', compact('acessorios', 'categorias'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
    'nome' => 'required|string|max:255',
    'valor_locacao' => 'required|numeric',
    'seminovo' => 'required|string', 
    'locacao' => 'required|string', 
    'ativo' => 'required|string', 
    'categoria_id' => 'required|exists:categorias,id', 
    'acessorios' => 'nullable|array', 
    'acessorios.*' => 'exists:acessorios,id' 
    ], [
    'nome.required' => 'O nome é obrigatório.',
    'seminovo.required' => 'O campo seminovo é obrigatório.',
    'locacao.required' => 'O campo locação é obrigatório.',
    'ativo.required' => 'O campo ativo é obrigatório.',
    'categoria_id.required' => 'A categoria é obrigatória.',
]);

$veiculo = Veiculo::create([
    'nome' => $validatedData['nome'],
    'valor_locacao' => $validatedData['valor_locacao'],
    'seminovo' => $validatedData['seminovo'],
    'locacao' => $validatedData['locacao'],
    'ativo' => $validatedData['ativo'],
    'categoria_id' => $validatedData['categoria_id'],
]);

if ($request->has('acessorios')) {
$veiculo->acessorios()->sync($validatedData['acessorios']); 
}

return redirect()->route('veiculos.index')->with('success', 'Veículo criado com sucesso!');
}

public function show($id)
{
    $veiculo = Veiculo::with(['categoria', 'acessorios'])->find($id);
    
    return view('veiculos.show', compact('veiculo'));
}
public function edit($id)
{
$veiculo = Veiculo::findOrFail($id);
$acessorios = Acessorio::all();
$categorias = Categoria::all();

return view('veiculos.edit', compact('veiculo', 'categorias','acessorios'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'valor_locacao' => 'required|numeric', 
        'seminovo' => 'required|string',  
        'locacao' => 'required|string',  
        'ativo' => 'required|string',
        'categoria_id' => 'required|exists:categorias,id', 
    ]);

    $veiculo = Veiculo::findOrFail($id);

    $veiculo->nome = $validatedData['nome'];
    $veiculo->valor_locacao = $validatedData['valor_locacao'];
    $veiculo->seminovo = $validatedData['seminovo'];
    $veiculo->locacao = $validatedData['locacao'];
    $veiculo->ativo = $validatedData['ativo'];
    $veiculo->categoria_id = $validatedData['categoria_id'];

    $veiculo->save();

    return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
}

public function destroy($id)
{
    $veiculo = Veiculo::findOrFail($id);
    $veiculo->delete();
    return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso!');
}
}