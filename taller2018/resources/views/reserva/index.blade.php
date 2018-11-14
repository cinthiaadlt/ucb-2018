@extends('layout.principal')

@section('content')

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Reservas de Hoy:</h3>
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
                                <th>Cliente</th>
                                <th>Precio Hora</th>
                                <th>Inicio Reserva</th>
                                <th>Fin Reserva</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reservas as $reserva)
                            @if($reserva['dia_reserva'] == date("Y-m-d"))
                            <tr>
                                <td>@foreach($pq2 as $p)
                                    @if($p->id_usuarios == $reserva['id_usuarios']){{ $p->primer_nombre }}&nbsp;{{ $p->primer_apellido }}@endif
                                    @endforeach</td>
                                <td>@foreach($pq1 as $p1)
                                    @if($p1->id_precios_alquiler == $reserva['id_precios_alquiler']){{ number_format((float)$p1->tarifa_hora_normal, 2, '.', '') }}Bs @endif
                                    @endforeach</td>
                                <td>{{$reserva['h_inicio_reserva']}}</td>
                                <td>{{$reserva['h_fin_reserva']}}</td>
                                <td>
                                    <form action="{{action('ReservaController@destroy', $reserva['id_reservas'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar la reserva?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
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
