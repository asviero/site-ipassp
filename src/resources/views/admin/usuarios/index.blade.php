@extends('admin.dashboard2')

@section('content')
<div class="container py-5">



 

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Usuários</h1>
        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-success">Novo <i class="fas fa-plus"></i></a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                    <td class="actions-buttons">
                        <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.usuarios.destroy', $user) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
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
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection