// public/js/map.js

const map = L.map('map').setView([-6.2088, 106.8456], 12); // Koordinat Jakarta

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

const marker = L.marker([-6.2088, 106.8456], { draggable: true }).addTo(map);

marker.on('dragend', function (event) {
    const position = marker.getLatLng();
    document.getElementById('latitude').value = position.lat;
    document.getElementById('longitude').value = position.lng;
});

const input = document.getElementById('lokasi');
input.addEventListener('input', function () {
    const placeName = input.value;
    if (!placeName) {
        return;
    }

    // Ganti koordinat dengan hasil pencarian dari geocoding service yang sesuai
    const latitude = -6.2088;
    const longitude = 106.8456;

    marker.setLatLng([latitude, longitude]);
    map.setView([latitude, longitude], 15);
    document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;
});
