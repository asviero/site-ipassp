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

    <h1>Nova Notícia</h1>

    <form action="{{ route('admin.noticias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título<span class="mandatory"> * </span></label>
            <input type="text" class="form-control" name="title" >
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo <span class="mandatory"> * </span></label>
            <textarea class="form-control" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Data/hora de publicação</label>
            <input type="datetime-local" class="form-control" name="published_at">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="toggleContent" name="displayed" checked>
            <label class="form-check-label" for="toggleContent">Habilitar conteúdo</label>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Categoria</label>
            <select name="category_id" class="form-control" id="published_at">
                <option value="">Selecione uma categoria</option>
                @foreach ($cat as $c)
                <option value="{{ $c->id }}"
                    {{ old('category_id') == $c->id ? 'selected' : '' }}>
                    {{ $c->label }}
                </option>
                @endforeach                
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection