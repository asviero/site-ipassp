<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Admin - IPASSP-SM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h4 class="mb-4">Admin IPASSP</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('admin.noticias.index') }}" class="nav-link text-white">Notícias</a></li>
                <li class="nav-item"><a href="{{ route('admin.usuarios.index') }}" class="nav-link text-white">Usuários</a></li>
            </ul>
        </div>

        <!-- Conteúdo -->
        <div class="flex-grow-1 p-4">
            @auth
                <div class="text-end mb-3">
                    <strong>Olá, {{ Auth::user()->name }}</strong>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                </div>
            @endauth

            @yield('content')
        </div>
    </div>
</body>
</html>
