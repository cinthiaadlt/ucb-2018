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
                                        <th>Calle</th>
                                        <th>Ciudad</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($zonas->count())
                                @foreach($zonas as $zona)
                                <tr>
                                    <td>{{$zona['zona']}}</td>
                                    <td>{{$zona['calle']}}</td>
                                    <td>{{$zona['ciudad']}}</td>

                                    <td><a class="btn btn-primary btn-xs" href="{{action('ZonaController@edit', $zona->id_zonas)}}" >
                                            <i class="ni ni-fat-add"></i></a></td>
                                    <td>
                                        <form action="{{action('ZonaController@destroy', $zona['id_zonas'])}}" method="post">
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
                            {{ $zonas->links() }}<br><br>
                            <a href="{{action('ZonaController@create')}}" class="btn btn-primary">Registro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
