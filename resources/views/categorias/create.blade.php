<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Categoria</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="form-container mt-5">
        <h2 class="mb-4 text-center">Formulário de Categoria</h2>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="nome" required>
            </div>
            <fieldset class="form-group">
                <legend>Ativo:</legend>
                <div class="custom-control custom-switch">
                    <input type="hidden" name="ativo" value="N">
                    <input type="checkbox" class="custom-control-input" id="ativoToggle">
                    <label class="custom-control-label" for="ativoToggle">Sim</label>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>
    </div>

    <!-- <script>
        // Atualiza o valor do campo "ativo" baseado no estado do toggle
        document.getElementById('ativoToggle').addEventListener('change', function() {
            document.querySelector('input[name="ativo"]').value = this.checked ? 'S' : 'N';
        });
    </script> -->
</body>
</html>
