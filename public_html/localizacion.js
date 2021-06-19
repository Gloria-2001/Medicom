var map;
 
// JSON con la información de las ciudades
var jsonString =
    '{"Madrid":{"Position":{"Longitude":40.405131,"Latitude":-3.724365}},"Barcelona":{"Position":{"Longitude":41.525030,"Latitude":2.449951}},"Bilbao":{"Position":{"Longitude":43.237199,"Latitude":-2.922363}},"A Coruña":{"Position":{"Longitude":43.357138,"Latitude":-8.415527}},"Granada":{"Position":{"Longitude":37.177826,"Latitude":-3.592529}},"Alicante":{"Position":{"Longitude":38.333039,"Latitude":-0.483398}},"Vigo":{"Position":{"Longitude":42.228517,"Latitude":-8.701172}},"Málaga":{"Position":{"Longitude":36.71246,"Latitude":-4.427490}},"Santander":{"Position":{"Longitude":43.460894,"Latitude":-3.812256}},"Badajoz":{"Position":{"Longitude":38.865375,"Latitude":-6.976318}}}';
 
var myData = JSON.parse(jsonString);
 
function error(msg) {
    alert("error" + msg);
}
 
// Obtenemos la posición del usuario y lo manejamos con la función initialize
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(initialize, error, {
        maximumAge: 60000,
        timeout: 4000
    });
} else {
    error('Actualiza el navegador web para usar el API de localización');
}
 
 
function initialize(position) {
 
// Inicializamos las opciones del mapa
    var mapOptions = {
        zoom: 6,
        // Establecemos la posición actual como centro
        center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
        // Este es el estilo proporcionado por Snazzy Maps.
        styles: [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 29
            }, {
                "weight": 0.2
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 18
            }]
        }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 16
            }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 21
            }]
        }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#000000"
            }, {
                "lightness": 16
            }]
        }, {
            "elementType": "labels.text.fill",
            "stylers": [{
                "saturation": 36
            }, {
                "color": "#000000"
            }, {
                "lightness": 40
            }]
        }, {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 19
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 17
            }, {
                "weight": 1.2
            }]
        }],
 
 
        disableDefaultUI: true,
    };
 
    // Cargamos el mapa en el contenedor html creado.
    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
 
    // Añadimos un marcador a la posición actual
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
        map: map,
        title: "Usted está aquí."
    });
 
    var distanceObj = [],
        i = 0;
 
    // Calculamos la distancia entre los puntos
    $.each(myData, function(a, b) {
        distanceObj[i] = {
            distance: coordsDistance(position.coords.latitude, position.coords.longitude, b.Position.Longitude, b.Position.Latitude),
            location: b,
            city: a
        };
        ++i;
    });
 
     // Ordenamos los elementos del array por el valor distancia obtenido
    distanceObj.sort(function(a, b) {
        return parseInt(a.distance) - parseInt(b.distance)
    });
 
    // Pintamos cada uno de los lugares
    $.each(distanceObj, function(a, b) {
        $('#markers ul').append('<li>' + b.city + ': ' + b.distance + 'KM </li>;
 
 
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(b.location.Position.Longitude, b.location.Position.Latitude),
            map: map,
        });
 
 
 
        marker['infowindow'] = new google.maps.InfoWindow({
            content: b.city,
            maxWidth: 500,
            width: 500
        });
 
        google.maps.event.addListener(marker, 'mouseover', function() {
            marker['infowindow'].open(map, marker);
 
        });
 
        google.maps.event.addListener(marker, 'mouseout', function() {
            marker['infowindow'].close();
 
        });
 
 
 
    });
 
}
 
 
// Función que calcula la distancia entre dos coordenadas devuelta en KM
function coordsDistance(meineLongitude, meineLatitude, long1, lat1) {
    erdRadius = 6371;
 
    meineLongitude = meineLongitude * (Math.PI / 180);
    meineLatitude = meineLatitude * (Math.PI / 180);
    long1 = long1 * (Math.PI / 180);
    lat1 = lat1 * (Math.PI / 180);
 
    x0 = meineLongitude * erdRadius * Math.cos(meineLatitude);
    y0 = meineLatitude * erdRadius;
 
    x1 = long1 * erdRadius * Math.cos(lat1);
    y1 = lat1 * erdRadius;
 
    dx = x0 - x1;
    dy = y0 - y1;
 
    d = Math.sqrt((dx * dx) + (dy * dy));
 
 
    return Math.round(d);
};