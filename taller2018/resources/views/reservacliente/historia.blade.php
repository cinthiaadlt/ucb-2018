@extends('layout.principal')

@section('content')

<div id="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Historial de Reservas:</h3>
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
                                <th>Contacto</th>
                                <th>Fecha Reserva</th>
                                <th>Direccion</th>
                                <th>Zona</th>
                                <th>Precio Hora</th>
                                <th>Inicio Reserva</th>
                                <th>Fin Reserva</th>
                                <th>Total Pagado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php date_default_timezone_set('America/La_Paz');?>
                            @foreach($prueba as $reserva)
                            @if($reserva->dia_reserva < date("Y-m-d"))
                            <tr>
                                <td>{{$reserva->telefono_contacto_1}}</td>
                                <td>{{$reserva->dia_reserva}}</td>
                                <td>{{ $reserva->direccion }}</td>
                                <td>{{$reserva->zona}}</td>
                                <td>{{ number_format((float)$reserva->tarifa_hora_normal, 2, '.', '') }}Bs</td>
                                <td>{{$reserva->h_inicio_reserva}}</td>
                                <td>{{$reserva->h_fin_reserva}}</td>
                                <td>{{ number_format((float)$reserva->total_reserva, 2, '.', '') }}Bs</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{action('ReservaClienteController@index')}}" class="btn btn-primary">Reservas Hoy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
