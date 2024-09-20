<x-app-layout>
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
            <h1 class="display-1 pt-5 pb-5">3G Locadora</h1>
            <p>
                <a href="#" class="btn btn-primary my-2">Locação</a>
                <a href="#" class="btn btn-secondary my-2">Seminovos</a>
            </p>
        </section>
        <div class="container text-center pt-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{asset('img/carro1.jpeg')}}" class="mx-auto" alt="">>
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('img/carro2.jpeg')}}" class="mx-auto" alt="">>
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('img/carro3.jpeg')}}" class="mx-auto" alt="">>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>           
        </div>
    </main>
</x-app-layout>

