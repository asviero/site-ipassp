<!-- Estrutura principal -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('layouts.partials.head')
    @include('layouts.styles.colors')
    @include('layouts.styles.components')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('layouts.header')
    
    <main class="container py-4">
        @yield('content')
    </main>

    @include('layouts.footer')
    @include('layouts.partials.scripts')
    
    <!-- Renderiza scripts específicos de páginas -->
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>