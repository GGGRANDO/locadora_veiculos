<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Método para exibir o formulário
    public function show()
    {
        return view('form'); // Retorna a view do formulário
    }

    // Método para processar o envio do formulário
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Aceita múltiplas imagens
            'seminovo' => 'required|in:sim,nao', // Validação para o botão seminovo
        ]);

        // Processar os dados
        $seminovo = $request->input('seminovo'); // Captura a seleção do seminovo

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public'); // Salvar no storage/app/public/images
                // Aqui você pode salvar o caminho da imagem no banco de dados, se necessário
            }
        }

        return redirect()->route('form.show')->with('success', 'Formulário enviado com sucesso!');
    }
}