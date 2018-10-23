@extends('layout.main')

@section('content')
    <div id="content">
        <div class="row">
            <section class="content">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left"><h3>Listado Vehiculos</h3></div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="{{ route('vehiculo.index') }}" class="btn btn-info" >Añadir Libro</a>
                                </div>
                            </div>

                            <div class="table-container">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Modelo</th>
                                    <th>Propietario Cliente</th>
                                    <th>Color</th>
                                    <th>Placa</th>
                                    <th>Foto Vehiculo</th>
                                    <th>Tipo Vehiculo</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    </thead>
                                    <tbody>
                                    @if($v->count())
                                        @foreach($v as $vehiculo)
                                            <tr>
                                                <td>{{$vehiculo->id_vehiculos}}</td>
                                                <td>{{$vehiculo->id_modelos}}</td>
                                                <td>{{$vehiculo->id_usuarios}}</td>
                                                <td>{{$vehiculo->color}}</td>
                                                <td>{{$vehiculo->placa}}</td>
                                                <td>{{$vehiculo->foto_vehiculo}}</td>
                                                <td>{{$vehiculo->cat_tipo_vehiculo}}</td>
                                                <td><a class="btn btn-primary btn-xs" href="{{action('VehiculoController@edit', $vehiculo->id_vehiculos)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                <td>
                                                    <form action="{{action('VehiculoController@destroy', $vehiculo->id_vehiculos)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
                            </div>
                        </div>
                        {{ $v->links() }}
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
@section('js')
    <script src="asset/js/jquery.min.js"></script>

@endsection