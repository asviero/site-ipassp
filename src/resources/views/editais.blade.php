@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-decoration-underline mb-4">Selecione o tipo de Edital:</h2>

    <div class="row justify-content-center g-4">
        <!-- Processo Seletivo de Estagiários -->
        <div class="col-md-6">
            <a href="{{ url('/editais/processo_seletivo_estagio') }}" class="text-decoration-none">
                <div class="card h-100 shadow border-start border-4 border-primary hover-shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-people-fill text-primary fs-1 me-4"></i>
                        <div>
                            <h5 class="card-title text-primary">Processo Seletivo de Estagiários</h5>
                            <p class="card-text text-muted">Acesse os editais voltados ao processo seletivo de estagiários.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Concurso Público -->
        <div class="col-md-6">
            <a href="{{ url('editais/concurso_publico') }}" class="text-decoration-none">
                <div class="card h-100 shadow border-start border-4 border-success hover-shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-award-fill text-success fs-1 me-4"></i>
                        <div>
                            <h5 class="card-title text-success">Concurso Público</h5>
                            <p class="card-text text-muted">Visualize todos os concursos públicos organizados pelo IPASSP-SM.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
