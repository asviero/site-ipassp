<header class="navbar-custom shadow-sm">
    <div class="container">
        <!-- Linha superior -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2">
            <!-- Logo -->
            <div class="d-flex align-items-center mb-2 mb-md-0">
                <a href="/" class="me-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 4rem;">
                </a>
            </div>
            
        <!-- Links rápidos -->
        @include('layouts.partials.header.quick-links')
        </div>

        <!-- Linha principal -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <!-- Menu de navegação -->
            <nav class="d-none d-md-flex gap-4">
                <a href="/institucional" class="text-decoration-none text-primary fw-medium">Institucional</a>
                <a href="/segurados" class="text-decoration-none text-primary fw-medium">Segurados</a>
                <a href="/dependentes" class="text-decoration-none text-primary fw-medium">Dependentes</a>
                <a href="/servidores" class="text-decoration-none text-primary fw-medium">Servidores</a>
                <a href="/legislacao" class="text-decoration-none text-primary fw-medium">Legislação</a>
            </nav>

            <!-- Campo de pesquisa -->
            <form action="{{ route('news.search') }}" method="GET" class="search-box">
                <input type="text" name="q" placeholder="Pesquisa no site..."
                    class="form-control rounded-pill ps-4" style="width: 250px;">
            </form>
        </div>
    </div>

    <!-- Usuário e Logout com Dropdown -->
    <div class="d-flex justify-content-end align-items-center py-2 position-absolute top-0 end-0 pe-4">
        @auth
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle fw-bold" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Área Administrativa</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-bold me-3">Login</a>
        @endguest
    </div>

</header>