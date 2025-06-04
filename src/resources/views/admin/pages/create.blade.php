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

    <h1>Nova página</h1>

    <form action="{{ route('admin.paginas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título<span class="mandatory"> * </span></label>
            <input type="text" class="form-control" name="title" >
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo <span class="mandatory"> * </span></label>
            <textarea class="form-control" id="summernote" name="content" rows="5" required>{{ old('content', $page->content ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="image[]" multiple>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="file[]" multiple>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="toggleContent" name="displayed" checked>
            <label class="form-check-label" for="toggleContent">Habilitar conteúdo</label>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Ordem</label>
            <input type="number" class="form-control" name="order">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Página mãe</label>
            <select name="parent_id" class="form-control" >
                <option value="">Selecione uma página</option>
                @foreach ($pages as $c)
                <option value="{{ $c->id }}"
                    {{ old('parent_id') == $c->id ? 'selected' : '' }}>
                    {{ $c->title }}
                </option>
                @endforeach                
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Menu</label>
            <select name="menu_id" class="form-control" >
                <option value="">Selecione uma página</option>
                @foreach ($menu as $c)
                <option value="{{ $c->id }}"
                    {{ old('menu_id') == $c->id ? 'selected' : '' }}>
                    {{ $c->label }}
                </option>
                @endforeach                
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection