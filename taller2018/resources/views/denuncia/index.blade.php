@extends('layout.principal')

@section('content')
<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Listado Denuncias Paqueo:</h3>

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
                                <th>Fecha</th>
                                <th>Descripcion Denuncia</th>
                                <th>Estado</th>
                                <th>Aciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($p2->count())
                            @foreach($p2 as $denuncia)
                            <tr>
                                <td>{{ $denuncia->cat_tipo_denuncia}}</td>
                                <td>{{ $denuncia->cat_nivel_gravedad}}</td>
                                <td></td>
                                <td>{{ $denuncia->descripcion_adicional}}</td>
                                <td>{{ $denuncia->estado_denuncia}}</td>


                                <td><a class="btn btn-primary btn-xs" href="{{action('DenunciaController@edit', $denuncia->id_denuncias)}}" onclick="return confirm('¿Desea cambiar el estado de la denuncia a resuelto?')" >
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
                        {{ $p2->links() }}<br><br>
                        <a href="{{action('ParqueoController@index')}}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
