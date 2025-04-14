@extends('layouts.app')  <!-- Herda do template base -->

@section('content')  <!-- Seção de conteúdo -->
<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h1 class="display-4">Bem-vindo ao IPASSP-SM</h1>
                <p class="lead">Instituto de Previdência e Assistência à Saúde dos Servidores Públicos Municipais de Santa Maria</p>
                
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