function centerMapByGeocoder(map, location) {
    var geocoder = new google.maps.Geocoder();

    geocoder.geocode( {'address' : location}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
        }
    });
}