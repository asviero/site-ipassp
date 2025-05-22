@extends('layouts.admin')

@section('content')
<div class="container py-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <h5><strong>Ocorreram alguns erros:</strong></h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Novo edital</h1>

    <form action="{{ route('admin.editais.update',  $pn) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titulo do arquivo</label>
            <input type="text" value="{{$pn->label}}" class="form-control" name="label" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Número do edital</label>
            <input type="number" value="{{$pn->number}}" class="form-control" name="number" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Ano</label>
            <input type="number" class="form-control" value="{{$pn->year}}" name="year" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Descrição</label>
            <textarea class="form-control"  name="short_desc" rows="5" >{{$pn->short_desc}}</textarea>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Data de publicação</label>
            <input type="date" class="form-control" value="{{ $pn->published_on?->format('Y-m-d') }}" name="published_on">
        </div>

        <div class="mb-3">
    <label class="form-label d-block">Status do edital</label>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="statusOpen" value="open" 
            @if ($pn->status == "open") 
            checked 
            @endif 
            >
            <label class="form-check-label" for="statusOpen">Aberto</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="statusClosed" value="close"
            @if ($pn->status == "close") 
            checked 
            @endif 
            >
            <label class="form-check-label" for="statusClosed">Fechado</label>
        </div>
    </div>

        <div class="mb-3">
            <label for="image" class="form-label">Arquivo</label>
            <input type="file" class="form-control" name="file_path" 
            accept=".pdf, .docx, .odt, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.oasis.opendocument.text">

            {{ $pn->file_path }}

        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="toggleContent" name="displayed" 
            @if ($pn->displayed) 
            checked 
            @endif 
            >
            <label class="form-check-label" for="toggleContent">Habilitar conteúdo</label>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection