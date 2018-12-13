@extends('layout.principal')

@section('content')




    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- LLAVE API KEY -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBqM_uRRSwywJEZ7kyEQxg_eLbrvTU-VNA&sensor=TRUE_OR_FALSE">
    </script>
    <!-- LLAVE API KEY -->
    <script type="text/javascript" src="https://hpneo.github.io/gmaps/gmaps.js"></script>
    <script type="text/javascript" src="https://hpneo.github.io/gmaps/prettify/prettify.js"></script>
    <script type="text/javascript"src="https://hpneo.github.io/gmaps/styles.css"></script>
    <link href='https://hpneo.github.io/gmaps/prettify/prettify.css' rel='stylesheet' type='text/css' />


    <!-- Mapa -->
<div id="content">
    <div class="container-fluid mt--7">
        <div class="col">
            <div class="col-xl-12 order-xl-1">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Parqueos Registrados</h3>
                </div>

                <div class="form-group col-md-12" >
                    <div aling="center" id="mymap">
                    </div>
                </div>

                <!-- Tabla de parqueos a validar -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Listado Parqueos</h3>
                </div>

                <div class="table-responsive">

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif

                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>Direccion</th>
                            <th>Capacidad</th>
                            <th>Imagen Parqueo/Validacion</th>
                            <th>Observaciones</th>
                            <th>Contacto</th>
                            <th>Estado</th>
                            <th colspan="1">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($parqueos->count())
                            @foreach($parqueos as $parqueo)
                                <tr>
                                    <td>{{$parqueo['direccion']}}</td>
                                    <td>{{$parqueo['cantidad_p']}}</td>
                                    <td>{{$parqueo['foto']}}
                                        <br>{{$parqueo['foto_validacion']}}</td>
                                    <td>{{$parqueo['observaciones_validacion']}}</td>
                                    <td><option>{{$parqueo['telefono_contacto_1']}}</option><option>{{$parqueo['telefono_contacto_2']}}</option></td>

                                    <td>
                                        @if($parqueo['estado_funcionamiento'] == '0')
                                            No Validado
                                        @else
                                            @if($parqueo['estado_funcionamiento'] == '1')
                                                Validado
                                            @else
                                                @if($parqueo['estado_funcionamiento'] == '2')
                                                    Denegado
                                                @else
                                                    @if($parqueo['estado_funcionamiento'] == '3')
                                                        Observar
                                                    @endif
                                                @endif

                                            @endif

                                        @endif

                                    </td>

                                    <td><a href="{{action('ValidacionController@edit', $parqueo['id_parqueos'])}}" class="btn btn-danger btn-sm" )">Editar Validacion</a></td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                        <br>
                        <br>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


    <script type="text/javascript">


        var locationsfalse = <?php print_r(json_encode($locationsfalse)) ?>;
        var locationstrue = <?php print_r(json_encode($locationstrue)) ?>;
        var locationsvac = <?php print_r(json_encode($locationsvac)) ?>; // parqueos cerrados termporalmente

        var mymap = new GMaps({
            el: '#mymap',
            lat: -16.4897,
            lng: -68.1193,
            zoom:13
        });
        var verde = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/009900/");

        var colrojo = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/red.png");

        var azul = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/blue.png");

        GMaps.geolocate({
            success: function(position) {
                mymap.setCenter(position.coords.latitude, position.coords.longitude);

            },
            error: function(error) {
                alert('Geolocalizacion fallida: '+error.message);
            },
            not_supported: function() {
                alert("Tu navegador no soporta geolocalizacion");
            }
        });


        $.each( locationsfalse, function( index, value ){

            if(value.estado_funcionamiento == '0')
                $vl="No Validado";
            else
                $vl="Validado";

            mymap.addMarker({
                icon : colrojo,
                scale : 6,
                lat: value.latitud_x,
                lng: value.longitud_y,
                title: value.direccion,
                infoWindow: {

                    content:
                    '<b>Direccion: </b>'+
                    '<br>'+value.direccion+
                    '<br><b>Espacios del parqueo:</b>'+
                    '<br>'+value.cantidad_p+
                    '<br><b>Foto de referencia:</b><br>' +
                    '<br><img width="200" height="100" src="./images/'+value.foto+'"><br>'+
                    '<br><b>Validacion del parqueo:  </b> '+$vl

                }

            });
        });

        $.each( locationstrue, function( index, value ){

            if(value.estado_funcionamiento == '0')
                $vl="No Validado";
            else
                $vl="Validado";

            if(value.cat_estado_parqueo == '1')
                $aaa="Abierto en funcionamiento";

            mymap.addMarker({
                icon : verde,
                scale : 6,
                lat: value.latitud_x,
                lng: value.longitud_y,
                title: value.direccion,
                infoWindow: {
                    content:
                    '<b>Direccion: </b>'+
                    '<br>'+value.direccion+
                    '<br><b>Espacios del parqueo:</b>'+
                    '<br>'+value.cantidad_p+
                    '<br><b>Foto de referencia:</b><br>' +
                    '<br><img width="200" height="100" src="./images/'+value.foto+'"><br>'+
                    '<br><b>Validacion del parqueo:  </b> '+$vl+
                    '<br><b>El parqueo esta:  </b> '+ $aaa

                }

            });
        });


        $.each( locationsvac, function( index, value ){

            if(value.estado_funcionamiento == '0')
                $vl="No Validado";
            else
                $vl="Validado";

            if(value.cat_estado_parqueo == '0')
                $aaa="Cerrado temporalmente";

            mymap.addMarker({
                icon : azul,
                scale : 6,
                lat: value.latitud_x,
                lng: value.longitud_y,
                title: value.direccion,
                infoWindow: {
                    content:
                    '<b>Direccion: </b>'+
                    '<br>'+value.direccion+
                    '<br><b>Espacios del parqueo:</b>'+
                    '<br>'+value.cantidad_p+
                    '<br><b>Foto de referencia:</b><br>' +
                    '<br><img width="200" height="100" src="./images/'+value.foto+'"><br>'+
                    '<br><b>Validacion del parqueo:  </b> '+$vl+
                    '<br><b>El parqueo esta:  </b> '+ $aaa

                }

            });
        });
    </script>

@endsection
