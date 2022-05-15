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
            zoom: 20,
        };

        /* start show map */
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        /* show marker */
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(8.4636, 99.8620),
            map: map,
            title: 'จุดเริ่มต้น'
        });

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(8.460799, 99.859021),
            map: map,
            title: 'จุดที่ 2'
        });        
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6wk2trQWVwXIZ7egSo2IVsIxql5fSCJc&callback=initMap"></script>

</html>