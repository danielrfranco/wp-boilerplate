/*
 * This searches for an element with the ID #map to load the map there
 * just call this google-maps.js from your php file, and you are done
 *
 * Function loadScript loads the rest of code you need for this map to work
 */

function loadScript(src,callback) {
    var script = document.createElement('script');
    script.type = "text/javascript";
    if(callback)script.onload=callback;
    document.getElementsByTagName("head")[0].appendChild(script);
    script.src = src;
}

function initMap() {

    var business = {
        lat: 20.584395,
        lng: -100.400042
    };
    var markerIcon = '{ Absolute URL to your icon }';

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: business,
        icon: markerIcon,
        scrollwheel: false,

        //Find more about this at: https://mapstyle.withgoogle.com/
        styles: [{
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
            }]
        }, {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#616161"
            }]
        }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#f5f5f5"
            }]
        }, {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        }, {
            "featureType": "poi",
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#eeeeee"
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "poi",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#757575"
            }]
        }, {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
                "color": "#e5e5e5"
            }]
        }, {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [{
                "color": "#dadada"
            }]
        }]
    });

    var info = new google.maps.InfoWindow({
        content: '<div id="content" class="map-info">' +
            '<div id="siteNotice"></div>' +
            '<div id="bodyContent">' +
            '<p>Médica Tec 100, Torre 1, Piso 12, Consultorio 1202, Privada Ignacio Zaragoza 16-A, Col. Centro, Querétaro, Qro., México. C.P. 76000.</p>' +
            '<a href="https://goo.gl/maps/omobG7tPwAn" class="btn" target="_blank">Ver en Google Maps</a>' +
            '</div>' +
            '</div>',
        maxWidth: 300
    });

    var marker = new google.maps.Marker({
        position: business,
        map: map,
        icon: iconoMarcador
    });

    info.open(map, marker);

    marker.addListener('click', function() {
        info.open(map, marker);
    });

}


(function($) {
    loadScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyCErKnmDpHpbO4TNqIJJrafPHOcmvgXDNI&callback=initMap'); //Or you can just use you Google Maps API key
})(jQuery);