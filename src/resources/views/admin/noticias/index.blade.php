@extends('admin.dashboard2')


@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Notícias</h1>
        <a href="{{ route('admin.noticias.create') }}" class="btn btn-success">Novo <i class="fas fa-plus"></i></a>
    </div>

    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Atualizado por</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tfoot>
            <tr>
                    <th>Título</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Atualizado por</th>
                    <th>Ações</th>
                </tr>

            </tfoot>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $item->updatedBy?->name ?? '-' }}</td>
                    <td class="actions-buttons">
                        <a href="{{ route('admin.noticias.edit', $item) }}" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.noticias.destroy', $item) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
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