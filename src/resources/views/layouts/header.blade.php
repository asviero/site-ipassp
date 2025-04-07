<!-- Cabeçalho -->

<header class="navbar-custom shadow-sm">
    <div class="container">
        <!-- Linha superior -->
        <div class="d-flex justify-content-between align-items-center py-2">
            <!-- Logo -->
            <a href="#" class="d-flex align-items-center">
                <img src="{{ asset('images/brasao-sm.png') }}" alt="Logo" class="h-16">
            </a>
            
            <!-- Título central -->
            <div class="text-center">
                <span class="fw-semibold text-primary">Instituto de Previdência e Assistência à Saúde dos Servidores Públicos Municipais de Santa Maria</span>
            </div>
            
            <!-- Links rápidos -->
            <div class="d-flex gap-3">
                <a href="#" class="text-decoration-none text-primary">
                    <span class="me-1">🔍</span> Transparência
                </a>
                <a href="#" class="text-decoration-none text-primary">
                    <span class="me-1">📞</span> Ouvidoria
                </a>
                <a href="#" class="text-decoration-none text-primary">
                    <span class="me-1">ℹ️</span> Acesso à Informação
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
                <input type="text" placeholder="Pesquisa no site..."
                    class="form-control rounded-pill ps-4" style="width: 250px;">
                <span class="search-icon">🔍</span>
            </div>
        </div>
    </div>
</header>