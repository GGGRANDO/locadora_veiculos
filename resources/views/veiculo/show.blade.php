<x-app-layout>

    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .hero {
            background-image: url('{{ asset('img/hero-bg.jpg') }}');
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            background-color: #003366;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        footer {
            background-color: #000;
            color: white;
            padding: 20px 0;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: underline;
        }

        a {
            color: #32CD32;
        }

        a:hover {
            color: #28a745;
        }

        /* Navbar Custom Styling */
        .navbar {
            background-color: #000 !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
        }

        .btn-outline-light {
            color: white !important;
            border-color: white !important;
        }

        .btn-outline-light:hover {
            color: #000 !important;
            background-color: white !important;
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }

        .card-body {
            background-color: #fff;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1.1rem;
        }
        </style>
    </head>

    <main role="main">
        <!-- Header com navegação -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">3G Locadora</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link text-light" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="#">Sobre Nós</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="/locacao">Locação</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="/seminovos">Seminovos</a></li>
                        </ul>
                        <div class="d-flex">
                            @if (Route::has('login'))
                            @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-light">Dashboard</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light">Log in</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                            @endif
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Seção de detalhes do veículo -->
        <section class="section text-center">
            <div class="container">
                <h2 class="mb-4">Detalhes do Veículo</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- Card com informações do veículo -->
                        <div class="card shadow-lg border-light">
                            <!-- Imagem do veículo -->
                            <img src="{{ asset('storage/' . $veiculo->imagem) }}" class="card-img-top"
                                alt="{{ $veiculo->nome }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $veiculo->nome }}</h5>
                                <p class="card-text">
                                    <strong>Preço de locação:</strong> R$
                                    {{ number_format($veiculo->valor_locacao, 2, ',', '.') }}
                                </p>
                                <p class="card-text">
                                    <strong>Categorias:</strong> {{ $veiculo->categoria->nome }}
                                </p>
                                <p class="card-text">
                                    <strong>Seminovo:</strong> {{ $veiculo->seminovo == 'S' ? 'Sim' : 'Não' }}
                                </p>
                                <a href="#" class="btn btn-primary">Locar agora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center py-4">
            <div class="container">
                <p>&copy; {{ date('Y') }} 3G Locadora. Todos os direitos reservados.</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="text-light">Política de Privacidade</a></li>
                    <li class="list-inline-item"><a href="#" class="text-light">Termos de Serviço</a></li>
                </ul>
            </div>
        </footer>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</x-app-layout>