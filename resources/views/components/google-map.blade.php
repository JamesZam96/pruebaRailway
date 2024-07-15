<div class="map-container">
    <div id="map"></div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<style>
    .map-container {
        display: flex;
        justify-content: center;
        align-items: center;
         /* Esto hace que el contenedor ocupe toda la altura de la ventana */
    }
    #map {
        height: 300px; /* Altura reducida */
        width: 80%; /* Ancho reducido */
        max-width: 600px; /* Ancho máximo */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([0, 0], 2);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    });
</script>