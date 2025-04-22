<!-- Cabeçalho -->

<header class="shadow-sm bg-white border-bottom">
    <div class="container">
        <!-- Linha superior -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2">
            <!-- Logo -->
            <a href="#" class="mb-2 mb-md-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 4rem;">
            </a>

            <!-- Links rápidos -->
            <div class="d-flex flex-wrap gap-3">
                <a href="#" class="text-decoration-none text-primary">
                    <i class="bi bi-search me-1"></i> Transparência
                </a>
                <a href="#" class="text-decoration-none text-primary">
                    <i class="bi bi-telephone me-1"></i> Ouvidoria
                </a>
                <a href="#" class="text-decoration-none text-primary">
                    <i class="bi bi-info-circle me-1"></i> Acesso à Informação
                </a>
            </div>
        </div>

        <!-- Linha principal -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
            <!-- Menu de navegação -->
            <nav class="mb-3 mb-md-0">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-primary fw-medium">Institucional</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-primary fw-medium">Segurados</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-primary fw-medium">Dependentes</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-primary fw-medium">Servidores</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-primary fw-medium">Legislação</a>
                    </li>
                </ul>
            </nav>

            <!-- Campo de pesquisa -->
            <form class="d-flex" role="search">
                <input class="form-control rounded-pill px-4" type="search" placeholder="Pesquisa no site..." aria-label="Search" style="width: 250px;">
            </form>
        </div>
    </div>
</header>