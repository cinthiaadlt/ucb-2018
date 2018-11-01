@extends('layout.principal')

@section('content')

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Listado Vehiculos</h3>
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
                                <th>Zona</th>
                                <th>Direccion</th>
                                <th>Latitud-Longitud</th>
                                <th>Cantidad Veiculos</th>
                                <th>Foto</th>
                                <th>Telefonos</th>
                                <th>Actividad</th>
                                <th>Estado del Parqueo</th>
                                <th>Validacion</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($p->count())
                            @foreach($p as $parqueo)
                            <tr>
                                <td>{{ $parqueo->id_zonas}}</td>
                                <td>{{ $parqueo->direccion}}</td>
                                <td>{{ $parqueo->latitud_x}}-{{ $parqueo->longitud_y}}</td>
                                <td>{{ $parqueo->cantidad_p}}</td>
                                <td>{{ $parqueo->foto}}</td>
                                <td>{{ $parqueo->telefono_contacto_1}}<br>{{ $parqueo->telefono_contacto_2}}</td>
                                <td>{{ $parqueo->estado_funcionamiento}}</td>
                                <td>{{ $parqueo->cat_estado_parqueo}}</td>
                                <td>{{ $parqueo->cat_validacion}}</td>

                                <td><a class="btn btn-primary btn-xs" href="{{action('ParqueoController@edit', $parqueo->id_parqueos)}}" >
                                        <i class="ni ni-fat-add"></i></a></td>
                                <td>
                                    <form action="{{action('ParqueoController@destroy', $parqueo->id_parqueos)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('¿Quiere borrar la zona?')" >
                                            <i class="ni ni-fat-remove"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $p->links() }}<br><br>
                        <a href="{{action('ParqueoController@create')}}" class="btn btn-primary">Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
