<!-- Estrutura principal -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('layouts.partials.head')
    @include('layouts.styles.colors')
    @include('layouts.styles.components')
</head>
<body class="bg-gray-100">
    @include('layouts.header')
    
    <main class="container py-4">
        @yield('content')
    </main>

    @include('layouts.footer')
    @include('layouts.partials.scripts')
</body>
</html>