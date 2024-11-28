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
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            background-color: #fff;
        }
        </style>
    </head>
    <main role="main">
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
                            <li class="nav-item"><a class="nav-link text-light" href="/dashboard">Home</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="/sobre-nos">Sobre Nós</a></li>
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

        <section class="hero">
            <div class="container">
                <h1>Sobre a 3G Locadora</h1>
                <p>Qualidade, confiança e experiência em locação de veículos</p>
            </div>
        </section>

        <section class="section text-center">
            <div class="container">
                <h2 class="mb-4">Nossa História</h2>
                <p class="lead">
                    A 3G Locadora é uma empresa comprometida em oferecer a melhor experiência de locação de veículos.
                    Fundada em 2010, nossa missão sempre foi garantir que cada cliente tenha a liberdade de viajar com
                    conforto,
                    segurança e a certeza de que está fazendo uma escolha inteligente. Nosso portfólio de veículos
                    é constantemente atualizado para garantir que nossos clientes sempre encontrem a melhor opção para
                    suas necessidades.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Missão</h3>
                        <p>
                            Proporcionar a melhor experiência de locação, com serviços de alta qualidade e um
                            atendimento personalizado,
                            superando as expectativas dos nossos clientes em todos os aspectos.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h3>Visão</h3>
                        <p>
                            Ser a locadora de veículos mais confiável e inovadora do mercado, reconhecida pela
                            excelência no atendimento
                            e pela ampla gama de veículos disponíveis.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-light text-center">
            <div class="container">
                <h2 class="mb-4">Nossa Equipe</h2>
                <p class="lead">
                    A equipe da 3G Locadora é composta por profissionais altamente qualificados, com um compromisso
                    profundo com a
                    satisfação dos nossos clientes. Desde a manutenção dos nossos veículos até o atendimento, nossa
                    equipe está
                    sempre pronta para oferecer um serviço de primeira qualidade.
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Equipe 1">
                        <h5 class="mt-3">João Silva</h5>
                        <p>Gerente de Operações</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Equipe 2">
                        <h5 class="mt-3">Maria Oliveira</h5>
                        <p>Coordenadora de Atendimento</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Equipe 3">
                        <h5 class="mt-3">Carlos Pereira</h5>
                        <p>Supervisor de Manutenção</p>
                    </div>
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