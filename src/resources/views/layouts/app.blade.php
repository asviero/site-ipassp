<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IPASSP-SM - Instituto de Previdência e Assistência à Saúde dos Servidores Públicos Municipais de Santa Maria')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-gradient-to-b from-blue-50 to-white shadow py-0.25">
        <div class="container mx-auto px-4">
            <!-- Linha superior -->
            <div class="flex justify-between items-center text-sm text-blue-600 py-2">
                <!-- Logo -->
                <a href="#">
                    <img src="{{ asset('images/brasao-sm.png') }}" alt="Logo" class="h-16 w-auto">
                </a>
                <!-- IPASSP -->
                <div class="flex-grow text-center">
                    <span class="text-base font-semibold text-blue-800">Instituto de Previdência e Assistência à Saúde dos Servidores Públicos Municipais de Santa Maria</span>
        </div>
                <!-- Links -->
                <div class="flex space-x-4">
                    <a href="#" class="hover:underline flex items-center">
                        🔍 Transparência
                    </a>
                    <a href="#" class="hover:underline flex items-center">
                        📞 Ouvidoria
                    </a>
                    <a href="#" class="hover:underline flex items-center">
                        ℹ️ Acesso à Informação
                    </a>
                </div>
            </div>

            <!-- Linha principal -->
            <div class="flex items-center justify-between py-4">
                <!-- Menu de navegação -->
                <nav class="hidden md:flex space-x-6 text-blue-700 font-medium">
                    <a href="#" class="hover:text-blue-500">Institucional</a>
                    <a href="#" class="hover:text-blue-500">Segurados</a>
                    <a href="#" class="hover:text-blue-500">Dependentes</a>
                    <a href="#" class="hover:text-blue-500">Servidores</a>
                    <a href="#" class="hover:text-blue-500">Legislação</a>
                </nav>

                <!-- Campo de pesquisa -->
                <div class="relative">
                    <input type="text" placeholder="Pesquisa no site..."
                        class="border rounded-full py-2 px-4 pl-10 w-64 focus:ring-2 focus:ring-blue-400">
                    <span class="absolute left-3 top-3 text-gray-400">🔍</span>
                </div>
            </div>
        </div>
    </header>


    <main class="p-4">
        @yield('content')
    </main>

    <footer class="p-4 mt-8 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} - Todos os direitos reservados
    </footer>
</body>
</html>
