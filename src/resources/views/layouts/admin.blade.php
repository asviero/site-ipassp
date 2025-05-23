<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Admin - IPASSP-SM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <style>
         html, body {
      height: 100%;
      margin: 0;
    }
    </style>
    <!-- DataTables CSS para Bootstrap -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body class="full-height">
    <div class="d-flex full-height">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3 style="width: 250px;">
            <h4 class="mb-4">Admin IPASSP</h4>
            <ul class="nav flex-column">
                <li class="nav-item{{ ($menu ?? '') === 'home' ? '-active' : '' }}"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                <li class="nav-item{{ ($menu ?? '') === 'paginas' ? '-active' : '' }}"><a href="{{ route('admin.paginas.index') }}" class="nav-link text-white">Páginas</a></li>
                <li class="nav-item{{ ($menu ?? '') === 'noticias' ? '-active' : '' }}"><a href="{{ route('admin.noticias.index') }}" class="nav-link text-white">Notícias</a></li>
                <li class="nav-item{{ ($menu ?? '') === 'slider' ? '-active' : '' }}"><a href="{{ route('admin.slider.index') }}" class="nav-link text-white">Slider</a></li>
                <li class="nav-item{{ ($menu ?? '') === 'editais' ? '-active' : '' }}"><a href="{{ route('admin.editais.index') }}" class="nav-link text-white">Editais</a></li>
                <li class="nav-item{{ ($menu ?? '') === 'usuarios' ? '-active' : '' }}"><a href="{{ route('admin.usuarios.index') }}" class="nav-link text-white">Usuários</a></li>
            </ul>
        </div>

        <!-- Conteúdo -->
        <div class="flex-grow-1 p-4 full-height">

        {{ $menu }}
            @auth
                <div class="d-flex justify-content-end mb-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="{{ url('/') }}">Tela Inicial</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
            <x-flash-message type="success" />
            <x-flash-message type="error" />
            <x-flash-message type="info" />

            @yield('content')
            
        </div>
    </div>

    <!-- Bootstrap Bundle (JS + Popper.js) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
    $('#minhaTabela').DataTable({
        pageLength: 5,
      language: {
       url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
      }
    });
  });
</script>
</body>
</html>
