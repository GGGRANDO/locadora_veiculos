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
        }

        .section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #000;
            color: white;
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
        </style>
    </head>

    <main role="main">
        <header>
            <nav class="navbar navbar-expand-lg">
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
                            <li class="nav-item"><a class="nav-link text-light" href="#">Serviços</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="#">Contato</a></li>
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

        <section class="hero">
            <div class="overlay"></div>
            <div class="container">
                <h1 class="display-4">Bem-vindo à 3G Locadora</h1>
                <p class="lead">A melhor solução para suas necessidades de locação de veículos.</p>
                <a href="#" class="btn btn-primary btn-lg">Explore Nossos Veículos</a>
                <a href="#" class="btn btn-light btn-lg">Locação Rápida</a>
            </div>
        </section>


        <section class="section text-center">
            <div class="container">
                <h2 class="mb-4">Por que escolher a 3G Locadora?</h2>
                <div class="row">
                    <div class="col-md-4">
                        <h4>Frota Diversificada</h4>
                        <p>Desde carros compactos até SUVs luxuosos, temos o veículo ideal para você.</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Preços Competitivos</h4>
                        <p>Oferecemos os melhores preços do mercado sem comprometer a qualidade.</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Atendimento 24h</h4>
                        <p>Estamos disponíveis 24 horas para garantir sua satisfação.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section text-center">
            <div class="container">
                <h2 class="mb-4">Testemunhos de Clientes</h2>
                <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <p class="lead">"A melhor experiência que já tive com locadoras! Recomendo!" - João Silva
                            </p>
                        </div>
                        <div class="carousel-item">
                            <p class="lead">"Serviço excelente e veículos em ótimo estado!" - Maria Oliveira</p>
                        </div>
                        <div class="carousel-item">
                            <p class="lead">"Sempre minha primeira escolha para locação!" - Carlos Souza</p>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

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