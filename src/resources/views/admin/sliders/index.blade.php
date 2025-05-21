@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Sliders</h1>
        <a href="{{ route('admin.slider.create') }}" class="btn btn-success">Novo Slider</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle" id="minhaTabela">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Conteúdo</th>                   
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                   
                    <td>
                        <a href="{{ route('admin.slider.edit', $item) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('admin.slider.destroy', $item) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
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
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection