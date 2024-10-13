<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <!-- Link para o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="border rounded p-4 bg-light mx-auto" style="max-width: 500px;">
            <h1 class="text-center">Editar Registro</h1>

            <form method="POST" action="{{ route('categorias.update', $categorias->id) }}">
                @csrf
                @method('PUT')
                <!-- Token de segurança para proteção contra CSRF e método PUT para atualização -->

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome', $categorias->nome) }}"
                        class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Ativo:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary {{ old('ativo', $categorias->ativo) == 'S' ? 'active' : '' }}">
                            <input type="radio" name="ativo" value="S"
                                {{ old('ativo', $categorias->ativo) == 'S' ? 'checked' : '' }} required> Sim
                        </label>
                        <label class="btn btn-secondary {{ old('ativo', $categorias->ativo) == 'N' ? 'active' : '' }}">
                            <input type="radio" name="ativo" value="N"
                                {{ old('ativo', $categorias->ativo) == 'N' ? 'checked' : '' }} required> Não
                        </label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Link para o JS do Bootstrap (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>