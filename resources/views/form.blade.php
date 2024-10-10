<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
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
        <h2 class="mb-4 text-center">Formulário de Contato</h2>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <fieldset class="form-group">
                <legend>Seminovo:</legend>
                <div class="toggle-btn">
                    <input type="hidden" name="seminovo" id="seminovo" value="N">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="seminovoToggle">
                        <label class="custom-control-label" for="seminovoToggle">Sim</label>
                    </div>
                </div>
                @error('seminovo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </fieldset>

            <div class="form-group">
                <label for="images">Imagens:</label>
                <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple
                    required>
                @error('images.*')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    // Script para atualizar o valor do campo "seminovo" baseado no estado do toggle
    document.getElementById('seminovoToggle').addEventListener('change', function() {
        document.getElementById('SIM').value = this.checked ? 'S' : 'N';
    });
    </script>
</body>

</html>