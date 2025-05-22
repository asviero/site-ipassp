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
    <h1>Editar Notícia</h1>

    <form action="{{ route('admin.noticias.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" value="{{ $news->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea class="form-control" name="content" rows="5" required>{{ $news->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Data/hora de publicação</label>
            <input type="datetime-local" class="form-control" name="published_at" value="{{$news->published_at}}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="image">
            @if($news->getFirstMediaUrl('default'))
                <img src="{{ $news->getFirstMediaUrl('default') }}" class="img-fluid mt-2" style="max-height: 150px;">
            @endif
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="toggleContent" name="displayed"  @checked(old('displayed', $news->displayed ?? false))>
            <label class="form-check-label" for="toggleContent">Habilitar conteúdo</label>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Categoria</label>
            <select name="category_id" class="form-control" id="published_at">
                <option value="">Selecione uma categoria</option>
                @foreach ($cat as $c)
                <option value="{{ $c->id }}"
                {{ (old('category_id', $news->category_id ?? '') == $c->id) ? 'selected' : '' }}>
                {{ $c->label }}
                </option>
                @endforeach                
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection