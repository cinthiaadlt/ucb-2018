@extends('layout.principal')

@section('content')

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Validar Parqueos</h3>
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
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

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
                                        Invalido
                                    @else
                                        @if($parqueo['estado_funcionamiento'] == '1')
                                            Aprobado
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

                                <td><a href="{{action('ValidacionController@edit', $parqueo['id_parqueos'])}}" class="btn btn-warning" onclick="return confirm('¿Quiere validar el parqueo?')">Editar Validacion</a></td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
