<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="border rounded p-4 bg-light mx-auto" style="max-width: 500px;">
            <h1 class="text-center">Editar Veículo</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('veiculos.update', $veiculo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo Nome -->
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control"
                        value="{{ old('nome', $veiculo->nome) }}" required>
                </div>

                <!-- Campo Locação -->
                <div class="form-group">
                    <label for="valor_locacao">Locação:</label>
                    <input type="text" id="valor_locacao" name="valor_locacao" class="form-control"
                        value="{{ old('valor_locacao', $veiculo->valor_locacao) }}" required>
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria:</label>
                    <select id="categoria_id" name="categoria_id" class="form-control">
                        <option value="" disabled
                            {{ old('categoria_id', $veiculo->categoria_id) == '' ? 'selected' : '' }}>Selecione uma
                            Categoria</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id', $veiculo->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo Acessórios -->
                <div class="form-group">
                    <label for="acessorios">Acessórios:</label>
                    <select id="acessorios" name="acessorios[]" class="form-control" multiple>
                        @foreach ($acessorios as $acessorio)
                        <option value="{{ $acessorio->id }}"
                            {{ in_array($acessorio->id, $veiculo->acessorios->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $acessorio->nome }}
                        </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Segure Ctrl ou Shift para selecionar múltiplos
                        acessórios.</small>
                </div>
                <div class="form-group">
                    <label>Seminovo:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label
                            class="btn btn-secondary {{ old('seminovo', $veiculo->seminovo) == 'S' ? 'active' : '' }}">
                            <input type="radio" name="seminovo" value="S"
                                {{ old('seminovo', $veiculo->seminovo) == 'S' ? 'checked' : '' }}> Sim
                        </label>
                        <label
                            class="btn btn-secondary {{ old('seminovo', $veiculo->seminovo) == 'N' ? 'active' : '' }}">
                            <input type="radio" name="seminovo" value="N"
                                {{ old('seminovo', $veiculo->seminovo) == 'N' ? 'checked' : '' }}> Não
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Locação:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary {{ old('locacao', $veiculo->locacao) == 'S' ? 'active' : '' }}">
                            <input type="radio" name="locacao" value="S"
                                {{ old('locacao', $veiculo->locacao) == 'S' ? 'checked' : '' }}> Sim
                        </label>
                        <label class="btn btn-secondary {{ old('locacao', $veiculo->locacao) == 'N' ? 'active' : '' }}">
                            <input type="radio" name="locacao" value="N"
                                {{ old('locacao', $veiculo->locacao) == 'N' ? 'checked' : '' }}> Não
                        </label>
                    </div>
                </div>
                <!-- Campo Ativo -->
                <div class="form-group">
                    <label>Ativo:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary {{ old('ativo', $veiculo->ativo) == 'S' ? 'active' : '' }}">
                            <input type="radio" name="ativo" value="S"
                                {{ old('ativo', $veiculo->ativo) == 'S' ? 'checked' : '' }}> Sim
                        </label>
                        <label class="btn btn-secondary {{ old('ativo', $veiculo->ativo) == 'N' ? 'active' : '' }}">
                            <input type="radio" name="ativo" value="N"
                                {{ old('ativo', $veiculo->ativo) == 'N' ? 'checked' : '' }}> Não
                        </label>
                    </div>
                </div>
                <!-- Botão de Submissão -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>