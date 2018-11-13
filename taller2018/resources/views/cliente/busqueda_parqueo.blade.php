@extends('layout.principal')

@section('content')
    <div id="content">

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
        <script type="text/javascript"
                src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBqM_uRRSwywJEZ7kyEQxg_eLbrvTU-VNA&sensor=TRUE_OR_FALSE">
        </script>
        <script src="../../js/gmaps.js"></script>
        <script src="../../prettify/prettify.js"></script>
        <script src="../../prettify/prettify.css"></script>
        <div class="container-fluid mt--7">
            <div class="row">

                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Parqueos Disponibles</h3>
                        </div>

                            <div class="col-md-4">
                            <form method="post" id="geocoding_form">
                                <label for="address">Direccion:</label>
                                <div class="input">
                                    <input type="text" id="address" name="address" />
                                    <input type="submit" class="btn" value="Search" />
                                </div>
                            </form>
                            </div>
                            <div class="col-md-8" id="mymap" align="right">

                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">


        var locations = <?php print_r(json_encode($locations)) ?>;
        var mymap = new GMaps({
            el: '#mymap',
            lat: -16.4897,
            lng: -68.1193,
            zoom:15
        });
        var pinImage = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/009900/");

        GMaps.geolocate({
            success: function(position) {
                mymap.setCenter(position.coords.latitude, position.coords.longitude);
                mymap.addMarker({
                    lat:position.coords.latitude,
                    lng:position.coords.longitude,
                });
            },
            error: function(error) {
                alert('Geolocalizacion fallida: '+error.message);
            },
            not_supported: function() {
                alert("Tu navegador no soporta geolocalizacion");
            }
        });


        $.each( locations, function( index, value ){
            mymap.addMarker({
                icon : pinImage,
                scale : 6,
                lat: value.latitud_x,
                lng: value.longitud_y,
                title: value.direccion,
                infoWindow: {
                    content: 'La direccion es: '+value.direccion
                }

            });
        });

        $(document).ready(function(){
            prettyPrint();

        $('#geocoding_form').submit(function(e){
            e.preventDefault();
            GMaps.geocode({
                address: $('#address').val().trim(),
                callback: function(results, status){
                    if(status=='OK'){
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                    }
                }
            });
        });
        });



    </script>

@endsection
