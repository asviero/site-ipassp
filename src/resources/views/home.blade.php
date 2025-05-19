@extends('layouts.app')

@section('content')
<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <h1 class="display-4">Bem-vindo ao IPASSP-SM</h1>
                <p class="lead">Instituto de Previdência e Assistência à Saúde dos Servidores Públicos Municipais de Santa Maria</p>

                <!-- Carrossel de Notícias -->
                @if($news->count())
                <div id="newsCarousel" class="carousel slide mt-4 mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($news as $index => $item)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <div class="card border-0 shadow rounded carousel-card-bg">
                                <div class="row g-0 align-items-stretch">
                                    <div class="col-md-6">
                                        @if($item->getFirstMediaUrl('default'))
                                        <a href="{{ route('news.show', $item) }}" class="hover-zoom d-block">
                                            <img src="{{ $item->getFirstMediaUrl('default') }}"
                                                class="img-fluid h-100 w-100 object-fit-cover rounded-start"
                                                style="max-height: 300px;"
                                                alt="{{ $item->title }}">
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                                        <a href="{{ route('news.show', $item) }}" class="text-decoration-none text-dark hover-fade">
                                            <h5 class="card-title mb-2">{{ $item->title }}</h5>
                                            <p class="card-text mb-2">{{ Str::limit($item->content, 150) }}</p>
                                        </a>
                                    </div>
                                </div>
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

                <!-- Botão para todas as notícias -->
                <div class="text-center mt-3">
                    <a href="{{ route('news.index') }}"
                        class="btn"
                        style="background-color: #E9F1F7; color: #000; border: 1px solid #cfdde8;">
                        <i class="bi bi-plus-circle me-2"></i> Acesse todas as notícias
                    </a>
                </div>

                @else
                    <p class="text-muted mt-4">Nenhuma notícia disponível no momento.</p>
                @endif
                <!-- Fim do Carrossel -->

                <div class="mt-4">
                    <h4 class="mb-4 text-center fw-bold shadow-sm p-2 bg-light rounded">
                        <i class="me-2 text-warning"></i> Selecione um de nossos serviços online
                    </h4>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="bi bi-heart-pulse fs-1 text-success mb-3"></i>
                                    <h6 class="card-title">Plano de Saúde</h6>
                                    <p class="card-text small text-muted">Veja detalhes sobre seu plano e cobertura.</p>
                                    <a href="#" class="btn btn-outline-success btn-sm mt-2">Consultar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="bi bi-person-add fs-1 text-warning mb-3"></i>
                                    <h6 class="card-title">Prova de Vida</h6>
                                    <p class="card-text small text-muted">Realize a Prova de Vida de forma simplificada.</p>
                                    <a href="#" class="btn btn-outline-warning btn-sm mt-2">Agendar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="bi bi-files fs-1 text-primary mb-3"></i>
                                    <h6 class="card-title">Processo Seletivo de Estagiários</h6>
                                    <p class="card-text small text-muted">Encontre aqui os editais.</p>
                                    <a href="http://localhost/editais" class="btn btn-outline-primary btn-sm mt-2">Consultar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
