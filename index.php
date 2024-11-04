<!DOCTYPE html>
<html>

<head>

<h1>
    <style>
        
    </style>
    WEBSITE GIS DATA KORDINAT
</h1>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leaflet JS in PHP</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            width: 100%;
            height: 600px;
            margin: -10px;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        <?php
        
        // You can use PHP to set dynamic variables that will be used in JavaScript
        $latitude = -6.1753924;
        $longitude = 106.8271528;
        $zoomLevel = 13;

        $latitude1 = -7.8013672;
        $longitude1 = 110.3647568;
        $zoomLevel = 13;

        $latitude2 = -6.9174639;
        $longitude2 = 107.6191228;
        $zoomLevel = 13;

        $latitude3 = -6.9818005;
        $longitude3 = 110.4120729;
        $zoomLevel = 13;

        // If you want to fetch data from a database, you can use PHP here.
        // Example:

        // $dataFromDatabase = getMarkersFromDatabase(); // This is a placeholder function
        
        // If you have multiple markers or data from the server, convert it to JSON for JavaScript use
        // $markers = json_encode($dataFromDatabase);
        ?>
        
        // JavaScript section
        var map = L.map("map").setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], <?php echo $zoomLevel; ?>);

        // Tile Layer Base Map
        var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        });

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });

        var rupabumiindonesia = L.tileLayer('https://geoservices.big.go.id/rbi/rest/services/BASEMAP/Rupabumi_Indonesia/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Badan Informasi Geospasial'
        });

        // Add Esri basemap
        Esri_WorldImagery.addTo(map);

        // Add Marker using PHP variables
        var marker = L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]);
        marker.bindPopup("<b>Hello</b><br>This is a popup");
        marker.bindTooltip("This is a tooltip");
        marker.addTo(map);

        var marker = L.marker([<?php echo $latitude1; ?>, <?php echo $longitude1; ?>]);
        marker.bindPopup("<b>Hello</b><br>This is a popup");
        marker.bindTooltip("This is a tooltip");
        marker.addTo(map);

        var marker = L.marker([<?php echo $latitude2; ?>, <?php echo $longitude2; ?>]);
        marker.bindPopup("<b>Hello</b><br>This is a popup");
        marker.bindTooltip("This is a tooltip");
        marker.addTo(map);

        var marker = L.marker([<?php echo $latitude3; ?>, <?php echo $longitude3; ?>]);
        marker.bindPopup("<b>Hello</b><br>This is a popup");
        marker.bindTooltip("This is a tooltip");
        marker.addTo(map);

        // Add Layers
        var baseMaps = {
            "OpenStreetMap": osm,
            "Esri World Imagery": Esri_WorldImagery,
            "Rupa Bumi Indonesia": rupabumiindonesia,
        };

        var overlayMaps = {
            "Marker": marker
        };

        L.control.layers(baseMaps, overlayMaps).addTo(map);

        // Add scale control
        L.control.scale({ position: "bottomright" }).addTo(map);
    </script>

        <?php

        $Latitude = array();
        $Longitude = array();


        include 'koneksi.php';
		$mysqli = mysqli_query($markers,"select * from markers");
		while($d = mysqli_fetch_array($koneksi)){
			?>
			<tr>
				<td><?php echo $Lokasi['Lokasi']; ?></td>
				<td><?php echo $Longitude['Longitude']; ?></td>
				<td><?php echo $Latitude['Latitude']; ?></td>
			<?php 
		}
        ?>

</body>

</html>
