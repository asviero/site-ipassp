<footer class="border-top bg-dark text-white">
    <!-- Informações institucionais -->
    <div class="container py-4">
        <div class="row text-center text-md-start">
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="fw-bold"><i class="bi bi-geo-alt me-2"></i>Endereço</h5>
                <p class="mb-0">
                    Rua André Marques, 820, sala 102 - Centro<br>
                    Santa Maria/RS - CEP 97010-041
                </p>
            </div>
            
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="fw-bold"><i class="bi bi-clock me-2"></i>Horário de Atendimento</h5>
                <p class="mb-0">Segunda a Sexta: 08h às 14h</p>
            </div>
            
            <div class="col-md-4">
                <h5 class="fw-bold"><i class="bi bi-telephone me-2"></i>Contato</h5>
                <p class="mb-1"><i class="bi bi-phone me-2"></i> (55) 3220-0378</p>
                <p class="mb-0"><i class="bi bi-envelope me-2"></i> contato@ipasspsm.net</p>
            </div>
        </div>
    </div>

    <!-- Seção do Mapa -->
    <div class="w-100">
        <div id="map" style="height: 300px; width: 100%;">
        <!DOCTYPE html>
<html>
  <head>
    <title>Simple Marker</title>
    <!-- The callback parameter is required, so we use console.debug as a noop -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv1CB_AjbD871D_raOxEPfcPbKrfbLo3Q&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <link rel="stylesheet" href="./style.css"/>
  </head>
  <body>
    <gmp-map center="-29.68471336364746,-53.804752349853516" zoom="14" map-id="DEMO_MAP_ID">
      <gmp-advanced-marker position="-29.68471336364746,-53.804752349853516" title="My location"></gmp-advanced-marker>
    </gmp-map>
  </body>
</html>


        </div>
    </div>
    
    <!-- Copyright -->
    <div class="bg-secondary text-white text-center py-2">
        &copy; {{ date('Y') }} IPASSP-SM - Todos os direitos reservados
    </div>

    <!-- Bootstrap Bundle JS (com Popper incluído) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</footer>
