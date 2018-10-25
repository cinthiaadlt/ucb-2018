@extends('layout.principal')

@section('content')
    <div id="content">

        <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Card tables</h3>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('vehiculo.index') }}" class="btn btn-info" >Añadir Libro</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Color</th>
                                <th>Placa</th>
                                <th>Foto Vehiculo</th>
                                <th>Tipo Vehiculo</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($v->count())
                                @foreach($v as $vehiculo)
                                    <tr>
                                        <td>{{$vehiculo->id_vehiculos}}</td>
                                        <td>{{$vehiculo->modelo}}</td>
                                        <td>{{$vehiculo->color}}</td>
                                        <td>{{$vehiculo->placa}}</td>
                                        <td>{{$vehiculo->foto_vehiculo}}</td>
                                        <td>{{$vehiculo->cat_tipo_vehiculo}}</td>
                                        <td><a class="btn btn-primary btn-xs" href="{{action('VehiculoController@edit', $vehiculo->id_vehiculos)}}" >
                                                <i class="ni ni-fat-add"></i></a></td>
                                        <td>
                                            <form action="{{action('VehiculoController@destroy', $vehiculo->id_vehiculos)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-xs" type="submit" >
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
                    </div>
                    {{ $v->links() }}
                </div>
            </div>
        </div>
        </div>

    </div>
@endsection
