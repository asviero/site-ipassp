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

    <h1>Nova página</h1>

    <form action="{{ route('admin.paginas.update', $page) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título<span class="mandatory"> * </span></label>
            <input type="text" value="{{ $page->title }}" class="form-control" name="title" >
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo <span class="mandatory"> * </span></label>
            <textarea class="form-control" name="content" rows="5" required>{{ $page->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Slug</label>
            <input type="text" value="{{ $page->slug }}" class="form-control" name="slug">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="toggleContent" name="displayed"  @checked(old('displayed', $page->displayed ?? false)) >
            <label class="form-check-label" for="toggleContent">Habilitar conteúdo</label>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Ordem</label>
            <input type="number" value="{{ $page->order }}" class="form-control" name="order">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Página mãe</label>
            <select name="parent_id" class="form-control" >
                <option value="">Selecione uma página</option>
                @foreach ($parent as $c)
                <option value="{{ $c->id }}"
                    {{ old('parent_id') == $c->id ? 'selected' : '' }}>
                    {{ $c->title }}
                </option>
                @endforeach                
            </select>
        </div>


        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection