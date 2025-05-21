@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>Editar Slider</h1>

    <form action="{{ route('admin.slider.update', $news) }}" method="POST" enctype="multipart/form-data">
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
            <label for="image" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="image">
            @if($news->getFirstMediaUrl('default'))
                <img src="{{ $news->getFirstMediaUrl('default') }}" class="img-fluid mt-2" style="max-height: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection