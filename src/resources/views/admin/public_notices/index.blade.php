@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Editais</h1>
        <a href="{{ route('admin.editais.create') }}" class="btn btn-success">Novo edital</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle" id="minhaTabela">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Número </th>   
                    <th>Ano</th>   
                    <th>arquivo</th>    
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($not as $item)
                <tr>
                    <td>{{ $item->label }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->year }}</td>
                    <td><a href="{{ $item->file_path }}" target="_blank" > {{ $item->label }} </a></td>

                    <td>
                        <a href="{{ route('admin.editais.edit', $item) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('admin.editais.destroy', $item) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
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