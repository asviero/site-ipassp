@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>New Slider</h1>

    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea class="form-control" name="content" rows="5" required></textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="toggleContent" name="displayed" checked>
            <label class="form-check-label" for="toggleContent">Habilitar conteúdo</label>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection