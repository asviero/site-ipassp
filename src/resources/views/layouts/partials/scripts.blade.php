<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Google Maps API -->
@if(config('services.google.maps_key'))
<script>
    function initMap() {
        const location = { lat: -29.6854, lng: -53.8045 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: location,
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#444444"}]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{"color": "#f2f2f2"}]
                }
            ]
        });
        new google.maps.Marker({ position: location, map, title: "IPASSP-SM" });
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap">
</script>
@endif