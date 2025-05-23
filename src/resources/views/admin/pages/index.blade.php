@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Páginas</h1>
        <a href="{{ route('admin.paginas.create') }}" class="btn btn-success">Nova página</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle" id="minhaTabela">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>conteúdo</th>
                    <th>slug</th>
                    <th>ordem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->order}}</td>
                    <td>
                        <a href="{{ route('admin.paginas.edit', $item) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('admin.paginas.destroy', $item) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            
        </div>
    </div>
</div>
@endsection