@extends('admin.dashboard2')

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

    <form action="{{ route('admin.editais.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo do arquivo <span class="mandatory"> * </span></label>
            <input type="text" class="form-control" value="{{ old('label') }}" name="label" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Número do edital <span class="mandatory"> * </span></label>
            <input type="number" class="form-control" value="{{ old('number') }}"  name="number" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Ano<span class="mandatory"> * </span></label>
            <input type="number" class="form-control" value="{{ old('year') }}" name="year" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Descrição</label>
            <textarea class="form-control" name="short_desc" rows="5" ></textarea>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Data de publicação</label>
            <input type="date" class="form-control" name="published_on">
        </div>

        <div class="mb-3">
    <label class="form-label d-block">Status do edital</label>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="statusOpen" value="open" checked>
            <label class="form-check-label" for="statusOpen">Aberto</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="statusClosed" value="closed">
            <label class="form-check-label" for="statusClosed">Fechado</label>
        </div>
    </div>

        

        <div class="mb-3">
            <label for="image" class="form-label">Arquivo</label>
            <input type="file" class="form-control" name="file_path" 
            accept=".pdf, .docx, .odt, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.oasis.opendocument.text"
            required>           
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="toggleContent" name="displayed" checked>
            <label class="form-check-label" for="toggleContent">Habilitar conteúdo</label>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection