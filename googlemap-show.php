<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> <!-- Responsive website -->
    <title>GPS Tracker</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body bgcolor="gray">
    <div id="googleMap" style="height:600px;" bgcolor="white">Show Google Map Here.</div>
</body>
<!-- Script view google map -->
<script>
    function initMap() {
        var mapProp = {
            center: new google.maps.LatLng(8.4636, 99.8620),
            mapTypeId: google.maps.MapTypeId.HYBRID,
            zoom: 17,
        };

        /* start show map */
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        /* show marker */
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(8.4636, 99.8620),
            map: map,
            icon: 'new_marker.png',
            title: 'จุดเริ่มต้น'
        });

        var location = [{
                name: "จุดที่ 2",
                lat: "8.460799",
                lon: "99.859021"
            },
            {
                name: "จุดที่ 3",
                lat: "8.462062",
                lon: "99.859686"
            }
        ]

        $.each(location, function(index, value) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(value.lat, value.lon),
                map: map,
                icon: 'new_marker.png',
                title: value.name
            });
        });       
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=API_Key&callback=initMap"></script>

</html>