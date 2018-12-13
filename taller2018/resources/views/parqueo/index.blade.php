@extends('layout.principal')

@section('content')

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Listado Parqueos</h3>
                    </div>

                    <div class="table-responsive">

                        @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Se encontro un error.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                    @endif

                        <table class="table align-items-center table-flush">
                            <thead>
                            <tr>
                                <th>Zona</th>
                                <th>Direccion</th>
                                <th>Cap.</th>
                                <th>Horarios</th>
                                <th>Dias</th>
                                <th>Contacto</th>
                                <th>Estado</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parqueos as $parqueo)
                            <tr>
                                <td>@foreach($pq2 as $p)
                                    @if($p->id_zonas == $parqueo['id_zonas']){{ $p->zona }}@endif
                                    @endforeach</td>
                                <td>{{$parqueo['direccion']}}</td>
                                <td>{{$parqueo['cantidad_p']}}</td>
                                <td><option>{{$parqueo['hora_apertura']}}</option>
                                    <option>{{$parqueo['hora_cierre']}}</option></td>
                                <?php 
                                $validado = DB::table('precios_alquiler')
                                    ->select('id_dias')
                                    ->where('id_parqueos', $parqueo['id_parqueos'])
                                    ->where('estado', true)
                                    ->orderBy('id_precios_alquiler')
                                    ->get();
                                ?>
                                <td>
                                    @foreach($validado as $val)
                                            @foreach($dias as $dia)
                                                @if($val->id_dias == $dia->id_dias)
                                                    <option>{{$dia->nombre}}</option>
                                                @endif
                                        @endforeach
                                    @endforeach
                                </td>
                                <td><option>{{$parqueo['telefono_contacto_1']}}</option><option>{{$parqueo['telefono_contacto_2']}}</option></td>
                                <td>@if($parqueo['estado_funcionamiento'] == '0') Inactivo @else Activo @endif</td>

                                <td><a href="{{action('ParqueoController@edit', $parqueo['id_parqueos'])}}" class="btn btn-sm btn-warning">Editar</a></td>
                                <td>
                                    <form action="{{action('ParqueoController@destroy', $parqueo['id_parqueos'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Desea Eliminar el parqueo de forma permanente?')">Eliminar</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{action('ParqueoController@create')}}" class="btn btn-primary">Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
