@extends('layouts.app')  <!-- Herda do template base -->

@section('content')  <!-- Seção de conteúdo -->
<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h1 class="display-4">Bem-vindo ao IPASSP-SM</h1>
                <p class="lead">Instituto de Previdência e Assistência à Saúde dos Servidores Públicos Municipais de Santa Maria</p>

                <!-- Carrossel de Notícias -->
                @if($news->count())
                <div id="newsCarousel" class="carousel slide mt-4 mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($news as $index => $item)
                            <div class="carousel-item @if($index === 0) active @endif">
                                @if($item->getFirstMediaUrl('default'))
                                    <img src="{{ $item->getFirstMediaUrl('default') }}" class="d-block w-100 rounded" alt="{{ $item->title }}">
                                @endif
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                                    <h5>{{ $item->title }}</h5>
                                    <p>{{ Str::limit($item->content, 100) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próxima</span>
                    </button>
                </div>
                @else
                    <p class="text-muted mt-4">Nenhuma notícia disponível no momento.</p>
                @endif
                <!-- Fim do Carrossel -->

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Selecione um de nossos serviços online</h5>
                        <a href="#" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
