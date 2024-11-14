<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="border rounded p-4 bg-light mx-auto" style="max-width: 500px;">
            <h1 class="text-center">Visualizar Registro</h1>

            <div class="form-group">
                <p id="nome" class="form-control-plaintext">
                    <label for="nome">Nome: </label>{{ $veiculo->nome }}
                </p>
            </div>

            <div class="form-group">
                <p id="ativo" class="form-control-plaintext">
                    <label for="ativo">Ativo: </label>{{ $veiculo->ativo == 'S' ? 'Sim' : 'Não' }}
                </p>
            </div>

            <div class="text-center">
                <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>