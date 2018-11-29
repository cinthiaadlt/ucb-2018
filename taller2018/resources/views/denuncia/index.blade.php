@extends('layout.principal')

@section('content')

<meta name="_token" content="{{ csrf_token() }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Listado Denuncias Paqueo:

                            @foreach($d2 as $d)
                            {{$d->sur_name}}
                            @endforeach

                        </h3>

                    </div>

                    <div class="table-responsive">

                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                        @endif

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Tipo Denuncia</th>
                                <th>Nivel Gravedad</th>
                                <!-- <th>Fecha</th> -->
                                <th>Descripcion Denuncia</th>
                                <th>Estado</th>
                                <th>Aciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($p2->count())
                                @foreach($p2 as $denuncia)
                                @if($denuncia->id_parqueos == $id)
                                <tr>
                                    <td>
                                        @if($denuncia->cat_tipo_denuncia == '1')
                                            Mal Servicio
                                            @else
                                            @if($denuncia->cat_tipo_denuncia == '2')
                                                Daño Vehiculo
                                                @else
                                                @if($denuncia->cat_tipo_denuncia == '3')
                                                    Daño Parqueo
                                                    @else
                                                    @if($denuncia->cat_tipo_denuncia == '4')
                                                        Parqueo mal estado
                                                        @else
                                                        @if($denuncia->cat_tipo_denuncia == '5')
                                                            Acoso / Lenguaje Ofensivo
                                                            @else
                                                            @if($denuncia->cat_tipo_denuncia == '6')
                                                                Irregularidades de pago
                                                                @else
                                                                @if($denuncia->cat_tipo_denuncia == '7')
                                                                    Otros
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endif

                                    </td>
                                    <td>
                                        @if($denuncia->cat_nivel_gravedad == '1')
                                        Bajo
                                        @else
                                            @if($denuncia->cat_nivel_gravedad == '2')
                                            Medio
                                            @else
                                                @if($denuncia->cat_nivel_gravedad == '3')
                                                Alto
                                                @endif
                                            @endif
                                        @endif

                                    </td>
                                    <!-- <td>{{ $denuncia->created_at}}</td> -->
                                    <td>{{ $denuncia->descripcion_adicional}}</td>
                                    <td>{{ $denuncia->estado_denuncia}}</td>


                                    <td><a class="btn btn-primary btn-xs" href="{{action('DenunciaController@edit', $denuncia->id_denuncias)}}" onclick="return confirm('¿Desea cambiar el estado de la denuncia?')" >Editar</a></td>


                                </tr>
                                @endif
                                @endforeach
                            @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $p2->links() }}<br><br>
                        <a href="{{action('ParqueoAdminController@index')}}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection




