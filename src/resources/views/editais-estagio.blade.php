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

        <h3 class="text-center mt-5 p-3 bg-dark text-white rounded shadow">
            Editais Processo Seletivo de Estagiários
        </h3>

        @isset($year)
            <h4 class="text-center mt-2">
                Ano selecionado: <span class="badge bg-dark">{{ $year }}</span>
            </h4>
        @endisset
    </div>

    <!-- Datepicker -->
    <div class="mt-4 mb-4">
        <label for="datepicker" class="form-label fw-bold">Selecione o ano:</label>
        <input type="text" id="datepicker" class="form-control w-25" placeholder="Selecione o ano">
    </div>

    <div id="editaisPorMes">
        @php
            $meses = [
                1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
                5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
                9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
            ];
        @endphp

        @foreach ($meses as $numero => $nome)
            <div class="mes-container mb-4 border rounded p-2" data-mes="{{ $numero }}">
                <h4 class="bg-light p-2 rounded shadow-sm text-decoration-underline">{{ $nome }}</h4>
                <div class="editais-lista" id="mes-{{ $numero }}">
                    @if(isset($editais[$numero]))
                        @foreach ($editais[$numero] as $edital)
                            <div class="card mb-2 p-2 shadow-sm border-0 rounded-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h6 class="mb-0 fw-semibold text-dark">
                                        {{ $edital->published_on->format('d/m/Y') }} -
                                        {{ $edital->label }} - Nº {{ $edital->number }}/{{ $edital->year }}
                                    </h6>
                                    <a href="{{ asset('storage/' . $edital->file_path) }}" download class="btn btn-sm btn-outline-secondary">
                                        Download
                                    </a>
                                </div>
                                <p class="mb-1 small text-muted">
                                    {{ $edital->short_desc }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Nenhum edital neste mês.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: "yyyy",
            minViewMode: 2,
            autoclose: true,
            language: 'pt-BR',
            startDate: '2019',
            endDate: '2022'
        });

        $('#datepicker').on('changeDate', function (e) {
            const anoSelecionado = e.format('yyyy');
            window.location.href = `http://localhost/editais/processo_seletivo_estagio/${anoSelecionado}`;
        });
    });
</script>
@endsection
