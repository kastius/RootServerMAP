<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
<title>DNS-ZONE.NET - Nameserver Map</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-language" content="de" />
<meta name="generator" content="Pico" />
<link rel="stylesheet" type="text/css" href="https://www.dns-zone.net/map/map.css" />

<script type="text/javascript" src="https://www.dns-zone.net/map/openlayers/OpenLayers.js"></script>
<script type="text/javascript" src="https://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
<script type="text/javascript" src="https://www.dns-zone.net/map/util.js"></script>

<script type="text/javascript">
//<![CDATA[

var map;

var showPopupOnHover = true;
text = new Array("Karteninformation einblenden","Karteninformation ausblenden");

function drawmap() {
    OpenLayers.Lang.setCode('de');

    map = new OpenLayers.Map('map', {
        projection: new OpenLayers.Projection("EPSG:900913"),
        displayProjection: new OpenLayers.Projection("EPSG:4326"),
        controls: [
		new OpenLayers.Control.MouseDefaults(),
		new OpenLayers.Control.Attribution()],
        maxExtent:
            new OpenLayers.Bounds(-20037508.34,-20037508.34,
                                    20037508.34, 20037508.34),
        numZoomLevels: 18,
        maxResolution: 156543,
        units: 'meters'
    });



// Add more controls..
map.addControl(new OpenLayers.Control.LayerSwitcher());
map.addControl(new OpenLayers.Control.PanZoomBar());



// Position and zoom of the map 6,47
lon = -30;
lat = 53;
zoom = 3;

checkForPermalink();




// Add layers

layer_markers = new OpenLayers.Layer.Markers("Marker", { projection: new OpenLayers.Projection("EPSG:4326"),visibility: true, displayInLayerSwitcher: false });
layer_vectors = new OpenLayers.Layer.Vector("Drawings", { displayInLayerSwitcher: false } );map.addLayer(layer_vectors);map.addLayer(layer_markers)
layers = new Array();
//layer_layerMapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
layer_layerMapnik = new OpenLayers.Layer.OSM(
    "OpenStreetMap",
    [
        '//a.tile.openstreetmap.org/${z}/${x}/${y}.png',
        '//b.tile.openstreetmap.org/${z}/${x}/${y}.png',
        '//c.tile.openstreetmap.org/${z}/${x}/${y}.png'
    ],
    null);

map.addLayer(layer_layerMapnik)
layers.push(new Array(layer_layerMapnik,'layer_layerMapnik'));
setLayer(0);


// Jump to the right position and zoom..
jumpTo(lon,lat,zoom);

// Add used maker icons..
icons = new Array();
icons[0] = new Array('https://www.dns-zone.net/map/images/pin_green.png','12','21','0','1');
icons[1] = new Array('https://www.dns-zone.net/map/images/pin_red.png','12','21','0','1');
icons[2] = new Array('https://www.dns-zone.net/map/images/pin_blue.png','12','21','0','1');


// Add markers
<?php include ("map.root-servers.net"); ?>

geometries = new Array();
jumpTo(lon, lat, zoom);
checkUtilVersion(4);
}

//]]>
    </script>
</head>
<body onload="drawmap();">

	<div id="descriptionToggle" onclick="toggleInfo()">Karteninformation anzeigen</div>
	<div id="description" class="hide">iese Karte zeigt alle 13 Root-Nameserver, und überprüft diese automatisch auf seine
Erreichbarkeit. Diese wird dann grafisch auf der Karte in Form einer grünen oder roten Stecknadel dargestellt.<br><br><img src=https://www.dns-zone.net/map/images/gruen.png width=8
height=8> = Nameserver ist Online<br><img src=https://www.dns-zone.net/map/images/rot.png width=8
height=8> = Nameserver ist Offline<br><br><small>Stand: <?php $datum = date("d.m.Y"); echo $datum; ?> um <?php $uhrzeit = date("H:i:s"); echo $uhrzeit;
?> Uhr</small><br><br>This script was sponsored by <a href=http://www.dns-zone.net>www.dns-zone.net</a></div>
	<div id="map"></div>
	<div class="hide"><p>Wenn Sie diesen Text sehen, dann haben Sie die HTML-Datei ohne die zusätzlich benötigten Dateien geöffnet. Wenn Sie versucht haben
die Karte herunterzuladen, wurde das Downloadfenster möglicherweise aus irgendeinem Grund nicht geöffnet. Speichern Sie in diesem Fall einfach diese Seite
ab.</p></div>
</body>
</html>
