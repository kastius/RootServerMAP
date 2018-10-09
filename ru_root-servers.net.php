<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//RU" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="RU" lang="RU">
<head>
<title>DNS-ZONE.NET - Nameserver Map</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-language" content="ru" />
<meta name="generator" content="Pico" />
<link rel="stylesheet" type="text/css" href="map.css" />

<script type="text/javascript" src="openlayers/OpenLayers.js"></script>
<script type="text/javascript" src="https://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
<script type="text/javascript" src="util.js"></script>

<script type="text/javascript">
//<![CDATA[

var map;

var showPopupOnHover = true;
text = new Array("Показать карту","Скрыть информацию о карте");

function drawmap() {
    OpenLayers.Lang.setCode('ru');

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
icons[0] = new Array('images/pin_green.png','12','21','0','1');
icons[1] = new Array('images/pin_red.png','12','21','0','1');
icons[2] = new Array('images/pin_blue.png','12','21','0','1');


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

	<div id="descriptionToggle" onclick="toggleInfo()">Показать карту</div>
	<div id="description" class="hide">Эта карта показывает все 13 корневых серверов имен и автоматически проверяет их
Достижимости. Затем это отображается графически на карте в виде зеленого или красного булавки.<br><br><img src=images/gruen.png width=8
height=8> = Сервер имен является В сети<br><img src=images/rot.png width=8
height=8> = Сервер имен является Не в сети<br><br><small>Stand: <?php $datum = date("d.m.Y"); echo $datum; ?> на <?php $uhrzeit = date("H:i:s"); echo $uhrzeit;
?> Час</small><br><br>Этот сценарий спонсировался <a href=http://www.dns-zone.net>www.dns-zone.net</a></div>
	<div id="map"></div>
	<div class="hide"><p>Если вы видите этот текст, вы открыли HTML-файл карты без необходимых файлов. Если вы попытаетесь загрузить карту, диалоговое окно загрузки может не иметь
по какой-то причине. В этом случае просто сохраните эту страницу.</p></div>
</body>
</html>
