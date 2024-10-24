<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Bem-vindo à Página Inicial</h1>
        <h2 class="mt-4">Acessórios</h2>

        <div class="mb-3">
            <a href="{{ route('acessorios.create') }}" class="btn btn-success">Criar Novo Acessório</a>
        </div>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acessorios as $acessorio)
                <tr>
                    <td>{{ $acessorio->id }}</td>
                    <td>{{ $acessorio->nome }}</td>
                    <td>{{ $acessorio->ativo == 'S' ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ route('acessorios.show', $acessorio->id) }}"
                            class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route('acessorios.edit', $acessorio->id) }}"
                            class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('acessorios.destroy', $acessorio->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>