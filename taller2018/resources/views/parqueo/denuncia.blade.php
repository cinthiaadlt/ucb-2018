@extends('layout.principal')

@section('content')
<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Listado Denuncias Usuario:</h3>
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
                                <th>Tipo Usuario</th>
                                <th>Fecha</th>
                                <th>Descripcion Denuncia</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th>Denuncias</th>

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
                                <td><a class="btn btn-primary btn-xs" href="{{action('ParqueoController@show', $parqueo->id_parqueos)}}" >
                                        <i class="ni ni-fat-add"></i></a></td>
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
