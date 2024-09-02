<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Apotik Sumenep</title>
    <style>
        #peta { height: 680px; }
    </style>
    <!-- css leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <!-- leafletjs -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <!-- leaflet-geosearch -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css">
    <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>
</head>
<body>
<div id="peta"></div>
<script>
    const providerOSM = new GeoSearch.OpenStreetMapProvider();

    // krdinat pusat
    const apotekKimiaFarmaCoords = [-7.0060, 113.8625];

    //leaflet map
    var leafletMap = L.map('peta', {
        fullscreenControl: true,
        minZoom: 10 
    }).setView(apotekKimiaFarmaCoords, 16); //zoom

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    }).addTo(leafletMap);

    // titk koordinat
    const bounds = L.latLngBounds(
        L.latLng(-7.115, 113.803), 
        L.latLng(-6.945, 113.925)  
    );

    let theMarker = {};

    leafletMap.on('click', function (e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        let popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Kordinat : " + latitude + " - " + longitude)
            .openOn(leafletMap);

        if (theMarker != undefined) {
            leafletMap.removeLayer(theMarker);
        }
        theMarker = L.marker([latitude, longitude]).addTo(leafletMap);
    });

    const search = new GeoSearch.GeoSearchControl({
        provider: providerOSM,
        style: 'icon',
        searchLabel: 'Klik Pencarian Lokasi',
        updateMap: true,
        retainZoomLevel: false,
    });

    leafletMap.addControl(search);

    // batas pencarian
    search.on('results', function (data) {
        for (let i = 0; i < data.results.length; i++) {
            if (bounds.contains(data.results[i].latlng)) {
                L.marker(data.results[i].latlng)
                    .addTo(leafletMap)
                    .bindPopup(data.results[i].label)
                    .openPopup();
            } else {
                alert('Pencarian hanya terbatas untuk area Sumenep.');
            }
        }
    });

    // marker
    L.marker(apotekKimiaFarmaCoords)
        .addTo(leafletMap)
        .bindPopup("Apotek Kimia Farma")
        .openPopup();

    
    const pharmacies = [
        { name: "Apotek Sumenep", lat: -7.0045, lng: 113.8610 },
        { name: "Apotek Kimia Farma", lat: -7.0060, lng: 113.8625 },
       
    ];

    pharmacies.forEach(function (pharmacy) {
        L.marker([pharmacy.lat, pharmacy.lng])
            .addTo(leafletMap)
            .bindPopup(pharmacy.name);
    });

</script>
</body>
</html>
