@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1>Nova Categoria</h1>

    <form action="{{ route('admin.categorias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="label" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Observação</label>
            <textarea class="form-control" name="observation" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection