<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBqM_uRRSwywJEZ7kyEQxg_eLbrvTU-VNA&sensor=TRUE_OR_FALSE">
    </script>
    <script src="/resources/js/gmaps.js"></script>

    <!-- <script src=" asset(resources/js/gmaps.js)"></script>
    -->

    <style type="text/css">
        #mymap {
            border:1px solid #070000;
            width: 800px;
            height: 500px;
        }
    </style>


</head>
<body>


<h1>Laravel 5 - Multiple markers in google map using gmaps.js</h1>


<div id="mymap"></div>


</body>
</html>

<script type="text/javascript">


    var locations = <?php print_r(json_encode($locations)) ?>;
    var mymap = new GMaps({
        el: '#mymap',
        lat: -16.4897,
        lng: -68.1193,
        zoom:15
    });


    $.each( locations, function( index, value ){
        mymap.addMarker({
            lat: value.latitud_x,
            lng: value.longitud_y,
            title: value.direccion,
            click: function(e) {
                alert('La direccion es: '+value.direccion);
            }
        });
    });


</script>