@extends('layout.principal')

@section('content')

    <div id="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">

                        <div class="card-header border-0">
                            <h3 class="mb-0">Zonas Disponibles</h3>
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
                                        <th>ID</th>
                                        <th>Zona</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($zonas->count())
                                @foreach($zonas as $zona)
                                <tr>
                                    <td>{{$zona['id_zonas']}}</td>
                                    <td>{{$zona['zona']}}</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{action('ZonaController@edit', $zona->id_zonas)}}" >
                                            <i class="ni ni-fat-add"></i></a></td>
                                    <td>
                                        <form action="{{action('ZonaController@destroy', $zona['id_zonas'])}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Quiere borrar la zona?')">
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