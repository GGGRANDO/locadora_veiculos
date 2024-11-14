<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Criação de Veículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="border rounded p-4 bg-light mx-auto" style="max-width: 500px;">
            <h1 class="text-center">Criar Novo Veículo</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('veiculos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
                </div>

                <div class="form-group">
                    <label for="locacao">Locação:</label>
                    <input type="text" id="locacao" name="locacao" class="form-control" value="{{ old('locacao') }}">
                </div>

                <div class="form-group">
                    <label>Seminovo:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary">
                            <input type="radio" name="seminovo" value="S" {{ old('seminovo') == 'S' ? 'checked' : '' }}> Sim
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="seminovo" value="N" {{ old('seminovo') == 'N' ? 'checked' : '' }}> Não
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ativo:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary">
                            <input type="radio" name="ativo" value="S" {{ old('ativo') == 'S' ? 'checked' : '' }}> Sim
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="ativo" value="N" {{ old('ativo') == 'N' ? 'checked' : '' }}> Não
                        </label>
                    </div>
                </div>

                <!-- Campo Categoria -->
                <div class="form-group">
                    <label for="categoria_id">Categoria:</label>
                    <select id="categoria_id" name="categoria_id" class="form-control">
                        <option value="" disabled selected>Selecione uma Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
