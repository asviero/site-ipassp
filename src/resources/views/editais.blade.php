@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2 class="text-decoration-underline">Edital Processo Seletivo</h2>

        <input type="text" id="datepicker" class="form-control w-25 mt-4" placeholder="Selecione o ano">
    </div>
@endsection

@section('scripts')
    <!-- jQuery (necessário para o Datepicker) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Datepicker JS + CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- Datepicker -->
    <script>
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: "yyyy",
                minViewMode: 2, //Mostrar somente o ano
                autoclose: true,
                startDate: '2019',
                endDate: '2022'
            });
        });
    </script>
@endsection
