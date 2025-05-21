@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>Editar Slider</h1>

    <form action="{{ route('admin.categorias.update', $cat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="label" value="{{ $cat->label }}" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $cat->slug }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Observação</label>
            <textarea class="form-control" name="observation" rows="5" required>{{ $cat->observation }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection