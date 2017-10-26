/* encoding="UTF-8" */
google.maps.event.addDomListener(window, 'load', initialize);
google.load("visualization", "1", {packages: ["columnchart"]});

var poland = {lat: 52.0, lng: 19.0};
var map;
var marker = new Array();

var routeProperties;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay;

var geocoder;
var infowindow;

var elevator;
var chart;
var elevations;
var wsk = null;

function initialize() {
    var mapOptions = {
        zoom: 6,
        center: poland
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('drivingHints'));
    directionsDisplay.setOptions({suppressMarkers: true});

    geocoder = new google.maps.Geocoder();
    infowindow = new google.maps.InfoWindow();

    elevator = new google.maps.ElevationService();
    chart = new google.visualization.ColumnChart(document.getElementById('profile'));
}

function create(){
    document.getElementById("info").innerHTML = "Wybierz punkt początkowy";
    google.maps.event.addListener(map, 'click', function(event) {
        addMarker(event, {});
    }); 
}

function addMarker( event, options){
    if(marker.length<7) {
        options.position = event.latLng;
        options.map = map;
        options.draggable = true;
        options.animation = google.maps.Animation.DROP;

        var tmp = new google.maps.Marker(options);

        google.maps.event.addListener(tmp, 'rightclick', function() {
            if (marker.length > 2){
               tmp.setMap(null);
               marker.splice(marker.indexOf(tmp),1);
               document.getElementById("info").innerHTML = "Zostało "+(7-marker.length)+" punktów przelotowych";
               setTrace();
            }
        });

        google.maps.event.addListener(tmp, 'click', function() {
            makeGeoCode(tmp);
        });

        google.maps.event.addListener(tmp, 'dragend', function() {
            setTrace();
        });

        google.visualization.events.addListener(chart, 'onmouseover', function (e) {
            if (wsk === null) {
                wsk = new google.maps.Marker({
                    position: elevations[e.row].location,
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/arrow.png"
                });
            } else {
                wsk.setPosition(elevations[e.row].location);
            }
        });

        marker.push(tmp);
        setTrace();
    }

    switch (marker.length){
        case 1:
            document.getElementById("info").innerHTML = "Wybierz punkt końcowy.";
            break;
        default:
            document.getElementById("info").innerHTML = "Zostało "+(7-marker.length)+" punktów przelotowych";
            break;
    }
}

function setTrace(){
    if(marker.length<2){
        return false;
    }
    var points = [];
    for(var i=2; i<marker.length; i++)
        points.push({location: marker[i].getPosition()});

    var tracetype = document.getElementById("type").value==null ? "DRIVING" :document.getElementById("type").value;

    if(wsk!=null) {
        wsk.setMap(null);
        wsk=null;
    }
    routeProperties =
    {
        origin: marker[0].getPosition(),
        destination: marker[1].getPosition(),
        waypoints: points,
        optimizeWaypoints: true,
        region: "pl",
        unitSystem: google.maps.UnitSystem.METRICAL,
        travelMode: google.maps.DirectionsTravelMode[tracetype]
    };

    directionsService.route(routeProperties, function (wynik, status){
        if(status == google.maps.DirectionsStatus.OK){
            directionsDisplay.setDirections(wynik);
            elevator.getElevationAlongPath({
                path: wynik.routes[0].overview_path,
                samples: 256
            }, plotElevation);
        }else if(status == google.maps.DirectionsStatus.ZERO){
            alert("W tym regionie nie można wyznaczyć trasy");
        }else{
            alert("Wystąpił błąd przy wyznaczaniu trasy");
        }
    });
}

function plotElevation(results, status) {
    if (status == google.maps.ElevationStatus.OK) {
        elevations = results;
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Wysokość');
        data.addColumn('number', 'Wysokość');
        for (i = 0; i < results.length; i++) {
            data.addRow(['', elevations[i].elevation]);
        }

        document.getElementById('profile').style.display = 'block';
        chart.draw(data, {
            width: 500,
            height: 230,
            legend: 'none',
            titleY: 'Wysokość (m)',
            focusBorderColor: '#000000'

        });
    }
}

function makeGeoCode( x ){
    geocoder.geocode({'latLng': x.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                infowindow.setContent(results[0].formatted_address);
                infowindow.open(map, x);
            } else {
                alert('No results found');
            }
        } else {
            alert('Geocoder failed due to: ' + status);
        }
    });
}

function deleteRoute(){
    for (var i in marker) {
        marker[i].setMap(null);
    }
    marker.splice(0,marker.length);
    directionsDisplay.setMap(null);
    document.getElementById('profile').style.display = 'none';
    document.getElementById("drivingHints").innerHTML = "";
    document.getElementById("info").innerHTML = "";
    initialize();    
}

function center(){
    if(marker.length==0){
        map.panTo(poland);
    }else{
        var area = new google.maps.LatLngBounds();
        for(var i=0; i<marker.length; i++){
            var punkt = marker[i].getPosition();
            area.extend(punkt);
        }
        map.fitBounds(area);
    }
}
