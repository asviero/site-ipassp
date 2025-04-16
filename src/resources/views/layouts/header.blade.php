<!-- Cabeçalho -->

<header class="navbar-custom shadow-sm">
    <div class="container">
        <!-- Linha superior -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2">
            <!-- Logo -->
            <div class="d-flex align-items-center mb-2 mb-md-0">
                <a href="#" class="me-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 4rem;">
                </a>
            </div>
            
            <!-- Links rápidos -->
            <div class="d-flex gap-3">
                <a href="#" class="text-decoration-none text-primary">
                    <i class="bi bi-search me-1"></i> Transparência
                </a>
                <a href="#" class="text-decoration-none text-primary">
                    <span class="bi bi-telephone me-1"></span> Ouvidoria
                </a>
                <a href="#" class="text-decoration-none text-primary">
                    <span class="bi bi-info-circle me-1"></span> Acesso à Informação
                </a>
            </div>
        </div>

        <!-- Linha principal -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <!-- Menu de navegação -->
            <nav class="d-none d-md-flex gap-4">
                <a href="#" class="text-decoration-none text-primary fw-medium">Institucional</a>
                <a href="#" class="text-decoration-none text-primary fw-medium">Segurados</a>
                <a href="#" class="text-decoration-none text-primary fw-medium">Dependentes</a>
                <a href="#" class="text-decoration-none text-primary fw-medium">Servidores</a>
                <a href="#" class="text-decoration-none text-primary fw-medium">Legislação</a>
            </nav>

            <!-- Campo de pesquisa -->
            <div class="search-box">
                <input type="text" placeholder="  Pesquisa no site..."
                    class="form-control rounded-pill ps-4" style="width: 250px;">
                <span class="search-icon">🔍</span>
            </div>
        </div>
    </div>
</header>