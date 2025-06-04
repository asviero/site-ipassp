@extends('admin.dashboard2')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Categorias</h1>
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-success">Novo <i class="fas fa-plus"></i></a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle" id="minhaTabela">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Slug</th>    
                    <th>Observação</th>                   
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cat as $item)
                <tr>
                    <td>{{ $item->label }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->observation }}</td>
                   
                    <td class="actions-buttons">
                        <a href="{{ route('admin.categorias.edit', $item) }}" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.categorias.destroy', $item) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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